var updatefrontenduserform = document.getElementById('updatefrontenduserform');
var editfrontenduserform = document.getElementById('editfrontenduserform');
var responsemessage = document.getElementById('responsemessage');
var modalheader = document.getElementById('modalheader');
var editfrontenduser = document.getElementsByClassName('edit-frontenduser');
var adminmodal = document.getElementsByClassName('admin-modal')[0];
var modalclose = document.getElementsByClassName('admin-modal-close');

for (var i = 0; i < modalclose.length; i++) {
	modalclose[i].addEventListener('click', function (e) {
		adminmodal.style.display = 'none';
		location.reload();
	})
}
if (typeof adminmodal !== 'undefined') {
	if (adminmodal.length > 0) {
		window.addEventListener('click', function (e) {
			if (e.target == adminmodal) {
				adminmodal.style.display = 'none';
				location.reload();
			}
		})
	}
}

if (editfrontenduser) {
	for (var i = 0; i < editfrontenduser.length; i++) {
		editfrontenduser[i].addEventListener('click', function (e) {
			e.stopPropagation();
			e.preventDefault();

			modalheader.innerHTML = 'Inloggegevens wijzigen';

			var requestid = this.getAttribute('data-id');

			var getFrontendUserData = 'action=getfrontenduser'
			getFrontendUserData += '&id=' + requestid + ''

			var getFrontendUserRequest = new XMLHttpRequest();

			getFrontendUserRequest.addEventListener('load', function () {
				if (this.readyState === 4) {
					console.log(this.response)
					if (this.status === 200) {
						var getFrontendUserResponse = JSON.parse(this.response)

						console.log(getFrontendUserResponse.success)

						responsemessage.innerHTML = ''
						responsemessage.style.display = 'none'
						editfrontenduserform.style.display = 'block'

						if (getFrontendUserResponse.success === true) {
							document.getElementById('editusername').value = '' + getFrontendUserResponse.username + '';
							document.getElementById('editdisplayname').value = '' + getFrontendUserResponse.displayname + '';
							editfrontenduserform.setAttribute('data-id', getFrontendUserResponse.id)
						}

						if (getFrontendUserResponse.success === false) {
							responsemessage.innerHTML = 'Gebruiker gegevens niet gevonden in de database.'
							responsemessage.style.display = 'block'
							editfrontenduserform.style.display = 'none'
							document.getElementById('editusername').value = '';
							document.getElementById('editpassword').value = '';
							document.getElementById('editdisplayname').value = '';
							editfrontenduserform.setAttribute('data-id', '')
						}
					}
				}
				if (this.status === 400) {
					var getFrontendUserResponse = JSON.parse(this.response)
					responsemessage.innerHTML = 'Gebruiker gegevens niet gevonden in de database.'
					responsemessage.style.display = 'block'
					editfrontenduserform.style.display = 'none'
					document.getElementById('editusername').value = '';
					document.getElementById('editpassword').value = '';
					document.getElementById('editdisplayname').value = '';
					editfrontenduserform.setAttribute('data-id', '')
				}
			})

			getFrontendUserRequest.open('POST', ajaxupdatefrontenduser.ajaxurl, true)
			getFrontendUserRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
			getFrontendUserRequest.send(getFrontendUserData)

			adminmodal.style.display = 'flex';
		})
	}
}

if (editfrontenduserform) {
	editfrontenduserform.addEventListener('submit', function (e) {
		e.stopPropagation();
		e.preventDefault();

		var updateFrontendUserData = 'action=updatefrontenduser'
		updateFrontendUserData += '&username=' + document.getElementById('editusername').value + ''
		updateFrontendUserData += '&password=' + document.getElementById('editpassword').value + ''
		updateFrontendUserData += '&displayname=' + document.getElementById('editdisplayname').value + ''
		updateFrontendUserData += '&id=' + editfrontenduserform.getAttribute('data-id') + ''

		var updateFrontendUserRequest = new XMLHttpRequest();

		updateFrontendUserRequest.addEventListener('load', function () {
			if (this.readyState === 4) {
				console.log(this.response)
				if (this.status === 200) {
					var updateFrontendUserResponse = JSON.parse(this.response)

					console.log(updateFrontendUserResponse.success)

					if (updateFrontendUserResponse.success === true) {

						responsemessage.innerHTML = 'Gebruiker gegevens bijgewerkt.'
						responsemessage.style.display = 'block'
						editfrontenduserform.style.display = 'none'
						editfrontenduserform.setAttribute('data-id', '')
						document.getElementById('editusername').value = '';
						document.getElementById('editpassword').value = '';
						document.getElementById('editdisplayname').value = '';
					}

					if (updateFrontendUserResponse.success === false) {
						responsemessage.innerHTML = 'Er is een fout oopgetreden tijdens het bijwerken van de gegevens.'
						responsemessage.style.display = 'block'
						editfrontenduserform.style.display = 'none'
						editfrontenduserform.setAttribute('data-id', '')
						document.getElementById('editusername').value = '';
						document.getElementById('editpassword').value = '';
						document.getElementById('editdisplayname').value = '';
					}
				}
			}
			if (this.status === 400) {
				var updateFrontendUserResponse = JSON.parse(this.response)

				responsemessage.innerHTML = 'Er is een fout oopgetreden tijdens het bijwerken van de gegevens.'
				responsemessage.style.display = 'block'
				editfrontenduserform.style.display = 'none'
				editfrontenduserform.setAttribute('data-id', '')
				document.getElementById('editusername').value = '';
				document.getElementById('editpassword').value = '';
				document.getElementById('editdisplayname').value = '';
			}
		})

		updateFrontendUserRequest.open('POST', ajaxupdatefrontenduser.ajaxurl, true)
		updateFrontendUserRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		updateFrontendUserRequest.send(updateFrontendUserData)
	})
}
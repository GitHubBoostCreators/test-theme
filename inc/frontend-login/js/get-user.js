var updatefrontenduserform = document.getElementById('updatefrontenduserform');
var editfrontenduser = document.getElementsByClassName('edit-frontenduser');
var adminmodalcontent = document.getElementsByClassName('admin-modal-content')[0];

for(var i=0; i < editfrontenduser.length; i++){
	editfrontenduser[i].addEventListener('click', function(e){
		e.stopPropagation();
		e.preventDefault();
		
		adminmodalcontent.style.display = 'block';
	})
}

if(updatefrontenduserform){
   updatefrontenduserform.addEventListener('submit', function(e){
	   e.stopPropagation();
	   e.preventDefault();
	   
	   var updateFrontendUserData = 'action=updatefrontenduser'
	   	   updateFrontendUserData += '&username='+document.getElementById('username').value+''
	   	   updateFrontendUserData += '&password='+document.getElementById('password').value+''
	   	   updateFrontendUserData += '&displayname='+document.getElementById('displayname').value+''
		
		var updateFrontendUserRequest = new XMLHttpRequest();
	
		updateFrontendUserRequest.addEventListener('load', function(){
			if (this.readyState === 4) {
				console.log(this.response)
				if(this.status === 200){
					var loginHandelingResponse = JSON.parse(this.response)
					
					console.log(updateFrontendUserResponse.success)
					
					if(updateFrontendUserResponse.success === true){
						location.reload();
					}
					
					if(updateFrontendUserResponse.success === false){
					}
				}
			}
			if(this.status === 400){
				var updateFrontendUserResponse = JSON.parse(this.response)
			}
		})
		
		updateFrontendUserRequest.open('POST', ajaxupdatefrontenduser.ajaxurl, true)
		updateFrontendUserRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		updateFrontendUserRequest.send(updateFrontendUserData)
   })
}
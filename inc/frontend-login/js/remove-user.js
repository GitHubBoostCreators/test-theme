var removefrontenduser = document.querySelectorAll('.remove-frontenduser');
for(var i=0; i < removefrontenduser.length; i++){
	document.querySelectorAll('.remove-frontenduser')[i].addEventListener('click', function(e){
		e.stopPropagation();
		e.preventDefault();
		
		var removeFrontenduserData = 'action=removefrontenduser'
			removeFrontenduserData += '&id='+this.getAttribute('data-id')+''
		
		var removeFrontenduserRequest = new XMLHttpRequest();
	
		removeFrontenduserRequest.addEventListener('load', function(){
			if (this.readyState === 4) {
				if(this.status === 200){
					var removeFrontenduserRequest = JSON.parse(this.response)
					location.reload();
				}
			}
			if(this.status === 400){
			}
		})
		
		removeFrontenduserRequest.open('POST', ajaxremovefrontenduser.ajaxurl, true)
		removeFrontenduserRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		removeFrontenduserRequest.send(removeFrontenduserData)
	})
}

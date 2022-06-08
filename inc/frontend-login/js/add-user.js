var addfrontenduserform = document.getElementById('addfrontenduserform');

if(addfrontenduserform){
   addfrontenduserform.addEventListener('submit', function(e){
	   e.stopPropagation();
	   e.preventDefault();
	   
	   var addFrontendUserData = 'action=addfrontenduser'
	   	   addFrontendUserData += '&username='+document.getElementById('username').value+''
	   	   addFrontendUserData += '&password='+document.getElementById('password').value+''
	   	   addFrontendUserData += '&displayname='+document.getElementById('displayname').value+''
		
		var addFrontendUserRequest = new XMLHttpRequest();
	
		addFrontendUserRequest.addEventListener('load', function(){
			if (this.readyState === 4) {
				console.log(this.response)
				if(this.status === 200){
					var addFrontendUserResponse = JSON.parse(this.response)
					
					console.log(addFrontendUserResponse.success)
					
					if(addFrontendUserResponse.success === true){
						location.reload();
					}
					
					if(addFrontendUserResponse.success === false){
					}
				}
			}
			if(this.status === 400){
				var addFrontendUserResponse = JSON.parse(this.response)
			}
		})
		
		addFrontendUserRequest.open('POST', ajaxaddfrontenduser.ajaxurl, true)
		addFrontendUserRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		addFrontendUserRequest.send(addFrontendUserData)
   })
}

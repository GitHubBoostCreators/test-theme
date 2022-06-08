var downloadform = document.getElementById('downloadform');
var downloadformSubmit = document.getElementById('downloadformSubmit');

if(downloadform){
   downloadform.addEventListener('submit', function(e){
	   e.stopPropagation();
	   e.preventDefault();
	   
	   var loginHandelingData = 'action=loginhandeling'
	   	   loginHandelingData += '&username='+document.getElementById('username').value+''
	   	   loginHandelingData += '&password='+document.getElementById('password').value+''
		
		var loginHandelingRequest = new XMLHttpRequest();
	
		loginHandelingRequest.addEventListener('load', function(){
			if (this.readyState === 4) {
				console.log(this.response)
				if(this.status === 200){
					var loginHandelingResponse = JSON.parse(this.response)
					
					console.log(loginHandelingResponse.success)
					
					if(loginHandelingResponse.success === true){
						setCookie('logedin', true, 365);
						location.reload();
					}
					
					if(loginHandelingResponse.success === false){
					}
				}
			}
			if(this.status === 400){
				var loginHandelingResponse = JSON.parse(this.response)
				setCookie('logedin', false, 365);
				console.log(loginHandelingResponse.success)
			}
		})
		
		loginHandelingRequest.open('POST', ajaxloginhandeling.ajaxurl, true)
		loginHandelingRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		loginHandelingRequest.send(loginHandelingData)
   })
}

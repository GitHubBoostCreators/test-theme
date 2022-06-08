// JavaScript Document
var securityform = document.getElementById('securityform');
var githubsettingsform = document.getElementById('githubsettingsform');
var apiform = document.getElementById('apiform');

if(apiform){
	apiform.addEventListener('submit', function(e){
	   e.stopPropagation();
	   e.preventDefault();
	})
}

if(githubsettingsform){
	githubsettingsform.addEventListener('submit', function(e){
	   e.stopPropagation();
	   e.preventDefault();
	
	
	var updateGitHubSettingsData = 'action=updategithubsettings'
	   	updateGitHubSettingsData += '&githubtoken='+document.getElementById('githubtoken').value+''
		
		var updateGitHubSettingsRequest = new XMLHttpRequest();
	
		updateGitHubSettingsRequest.addEventListener('load', function(){
			if (this.readyState === 4) {
				if(this.status === 200){
					var removeBlacklistRequest = JSON.parse(this.response)
					location.reload();
				}
			}
			if(this.status === 400){
			}
		})
		
		updateGitHubSettingsRequest.open('POST', ajaxadminupdatesettings.ajaxurl, true)
		updateGitHubSettingsRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		updateGitHubSettingsRequest.send(updateGitHubSettingsData)
	})
}
if(securityform){
   securityform.addEventListener('submit', function(e){
	   e.stopPropagation();
	   e.preventDefault();
	   
	   var updateSecuritySettingsData = 'action=updatesecuritysettings'
	   	   updateSecuritySettingsData += '&maxattempts='+document.getElementById('maxattempts').value+''
		
		var updateSecuritySettingsRequest = new XMLHttpRequest();
	
		updateSecuritySettingsRequest.addEventListener('load', function(){
			if (this.readyState === 4) {
				if(this.status === 200){
					var removeBlacklistRequest = JSON.parse(this.response)
					location.reload();
				}
			}
			if(this.status === 400){
			}
		})
		
		updateSecuritySettingsRequest.open('POST', ajaxadminupdatesettings.ajaxurl, true)
		updateSecuritySettingsRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		updateSecuritySettingsRequest.send(updateSecuritySettingsData)
   })
}
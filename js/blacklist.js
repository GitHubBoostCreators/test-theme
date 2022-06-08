var removeblacklist = document.querySelectorAll('.remove-blacklist');
var blacklistform = document.getElementById('blacklistform');

if(blacklistform){
   document.addEventListener('submit', function(e){
	   e.stopPropagation();
	   e.preventDefault();
	   
	   var addBlacklistData = 'action=addblacklist'
	   	   addBlacklistData += '&userip='+document.getElementById('userip').value+''
		
		var addBlacklistRequest = new XMLHttpRequest();
	
		addBlacklistRequest.addEventListener('load', function(){
			if (this.readyState === 4) {
				if(this.status === 200){
					var removeBlacklistRequest = JSON.parse(this.response)
					location.reload();
				}
			}
			if(this.status === 400){
			}
		})
		
		addBlacklistRequest.open('POST', ajaxadminblacklist.ajaxurl, true)
		addBlacklistRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		addBlacklistRequest.send(addBlacklistData)
   })
}

for(var i=0; i < removeblacklist.length; i++){
	document.querySelectorAll('.remove-blacklist')[i].addEventListener('click', function(e){
		e.stopPropagation();
		e.preventDefault();
		
		var removeBlacklistData = 'action=removeblacklist'
			removeBlacklistData += '&userip='+this.getAttribute('data-userip')+''
		
		var removeBlacklistRequest = new XMLHttpRequest();
	
		removeBlacklistRequest.addEventListener('load', function(){
			if (this.readyState === 4) {
				if(this.status === 200){
					var removeBlacklistRequest = JSON.parse(this.response)
					location.reload();
				}
			}
			if(this.status === 400){
			}
		})
		
		removeBlacklistRequest.open('POST', ajaxadminblacklist.ajaxurl, true)
		removeBlacklistRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		removeBlacklistRequest.send(removeBlacklistData)
	})
}
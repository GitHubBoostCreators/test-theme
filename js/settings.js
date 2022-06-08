// JavaScript Document
var settingslink = document.querySelectorAll('.settings-link');


function hidetabs(){
	var activetabcontent = document.querySelectorAll('.tabs-collapse.collapse.show');
	var activetab = document.querySelectorAll('.nav-link.settings-link.active');
	
	for(var i=0; i < activetabcontent.length; i++){
		activetabcontent[i].classList.remove('show')
		activetabcontent[i].classList.add('hide')
	}
	for(var j=0; j < activetab.length; j++){
		activetab[j].classList.remove('active')
	}	
}

for(var i=0; i < settingslink.length; i++){
	settingslink[i].addEventListener('click', function(e){
		e.preventDefault();
		e.stopPropagation();
		hidetabs();
		this.classList.add('active');
		document.querySelectorAll(''+ this.parentElement.getAttribute('data-target') +'')[0].classList.add('show');
	})
}
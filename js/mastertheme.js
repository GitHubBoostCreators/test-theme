var body = document.getElementsByTagName("BODY")[0];
var html = document.getElementsByTagName("HTML")[0];

/// LOAD CAROUSEL

/*var myCarousel = document.querySelector('.carousel');
var carousel = new bootstrap.Carousel(myCarousel);*/


/// TOGGLE HAMBURGERMENU

var menutoggle = document.getElementById('hamburgermenu-toggle');

menutoggle.addEventListener('click', function(e){
    var expanded = this.getAttribute("aria-expanded");
    var togglemenu = document.getElementById(this.getAttribute("data-toggle-menu"));

    if (expanded == "false") {
        // Tonen van mobile menu
        this.setAttribute("aria-expanded", "true");
        this.classList.add("is-active");
        html.classList.add("noscroll");
        body.classList.add("noscroll");
        togglemenu.classList.add("show");
        togglemenu.classList.remove("hide");
    } else {
        // Hiden van mobile menu
        this.setAttribute("aria-expanded", "false");
        this.classList.remove("is-active");
        html.classList.remove("noscroll");
        body.classList.remove("noscroll");
        togglemenu.classList.remove("show");
        togglemenu.classList.add("hide");
    }
});
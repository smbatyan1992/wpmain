var $ = jQuery;

//if ($('.team-slider').length) {} check if slider exists

var single_slide_bullets_fade = {
	loop: true,
	dots: false,
    autoplay: true,
    nav:true,
    lazyLoad: true,
    margin:24,
    navText: ['<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 512 512"><path d="M216.4 163.7c5.1 5 5.1 13.3.1 18.4L155.8 243h231.3c7.1 0 12.9 5.8 12.9 13s-5.8 13-12.9 13H155.8l60.8 60.9c5 5.1 4.9 13.3-.1 18.4-5.1 5-13.2 5-18.3-.1l-82.4-83c-1.1-1.2-2-2.5-2.7-4.1-.7-1.6-1-3.3-1-5 0-3.4 1.3-6.6 3.7-9.1l82.4-83c4.9-5.2 13.1-5.3 18.2-.3z" /><rect x="0" y="0" width="512" height="512" fill="rgba(0, 0, 0, 0)" /></svg>Previous','Next<svg viewBox="0 0 512 512"><path d="M322.2 349.7c-3.1-3.1-3-8 0-11.3l66.4-74.4H104c-4.4 0-8-3.6-8-8s3.6-8 8-8h284.6l-66.3-74.4c-2.9-3.4-3.2-8.1-.1-11.2 3.1-3.1 8.5-3.3 11.4-.1 0 0 79.2 87 80 88s2.4 2.8 2.4 5.7-1.6 4.9-2.4 5.7-80 88-80 88c-1.5 1.5-3.6 2.3-5.7 2.3s-4.1-.8-5.7-2.3z" /><rect x="0" y="0" width="512" height="512" fill="rgba(0, 0, 0, 0)" /></svg>'],
	autoplayTimeout: 7000,
	responsiveClass: true,
    responsive:{
        0:{
            items:1,
            autoHeight:true,
        },
        992:{
            items:2,
        },
    }
};

var single_slide_bullets = {
	loop: true,
    autoplay: true,
    animateIn: "fadeIn",
	animateOut: "fadeOut", 
	autoplayTimeout: 7000,
    items:1,
	responsiveClass: true,
    responsive:{
        0:{
            dots: false,
            autoHeight:true,
        },
        768:{
            dots: true,
        },
    }
};


var slider_section = $('.slider-section');
var testimonials_slider = $(".testimonials-slider");
var service_slider = $(".service-slider");

$(document).ready(function() {
    $("#burger-icon").click(function(){
        $(this).toggleClass("open");
        $("#site-nav").addClass("opend");
    });

    if(slider_section.length) {
		slider_section.owlCarousel(single_slide_bullets);
		slider_section.find(".owl-controls .owl-dots").wrap("<div class='container'></div>")
	}

	if(testimonials_slider.length) {
		testimonials_slider.owlCarousel(single_slide_bullets_fade);
	}
    
	if(service_slider.length) {
		service_slider.owlCarousel(full_gutter_24);
    }

    $(".user-content iframe").each(function () {
        $(this).wrap("<div class='ratio ratio-16x9'></div>")
    });

    mobileMenu();
    
    $(".move-down").click(function(){
        var hero_height = $(this).parent().parent().height();
        var to_scroll = hero_height + $("header").height() + 34;
        $("html, body").animate({ scrollTop:  to_scroll }, 2000);
    });
});

function mobileMenu() {
    if ($(window).width() < 992 ) {
        $(".menu-item-has-children > a").click(function(e){
            e.preventDefault();
            $(this).toggleClass("clicked");
            $(this).parent().find(".sub-menu").slideToggle();
        });
    }
}
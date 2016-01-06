$(document).ready(function(){
$('body').scrollspy({
    target: '.bs-docs-sidebar',
    offset: 40
});

    $("table").addClass("table");
$('.slick_carousel img').addClass("img-responsive center-block");

  $('.slick_carousel').slick({
    adaptiveHeight: true,
    fade: true,
    speed: 500,
    autoplay: true,
    autoplaySpeed: 3000,
	      dots: true,
	      swipeToSlide: true,
	      //    prevArrow: "<i class='fa fa-arrow-circle-left'></i>",
	      //    nextArrow: "<i class='fa fa-arrow-circle-right'></i>",
  });

    // smooth scrolling from http://stackoverflow.com/questions/14804941/how-to-add-smooth-scrolling-to-bootstraps-scroll-spy-function
    
    $("#nav ul li a[href^='#']").on('click', function(e) {

   // prevent default anchor click behavior
   e.preventDefault();

   // store hash
   var hash = this.hash;

   // animate
   $('html, body').animate({
       scrollTop: $(hash).offset().top
     }, 1000, function(){

       // when done, add hash to url
       // (default click behaviour)
       window.location.hash = hash;
     });

});
});

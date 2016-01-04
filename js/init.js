$(document).ready(function(){
$('body').scrollspy({
    target: '.bs-docs-sidebar',
    offset: 40
});

$('.slick_carousel img').addClass("img-responsive center-block");

  $('.slick_carousel').slick({
    adaptiveHeight: true,
    fade: true,
    autoplay: true,
    autoplaySpeed: 2000,
	      dots: true,
	      swipeToSlide: true,
	      //    prevArrow: "<i class='fa fa-arrow-circle-left'></i>",
	      //    nextArrow: "<i class='fa fa-arrow-circle-right'></i>",
  });
});

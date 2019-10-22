jQuery(window).on("load", function() {
    "use strict";


    jQuery(".menu-btn").on("click", function(){
     jQuery(this).toggleClass("active");
      jQuery("nav").toggleClass("active");
    });

    jQuery("html").on("click", function() {
      jQuery("nav").removeClass("active");
      jQuery(".menu-btn").removeClass("active");
    });
    jQuery(".menu-btn, nav").on("click", function(e) {
      e.stopPropagation();
    });
      jQuery('.banner-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        dots: false,
        arrows:true,
        autoplaySpeed: 2000,
        infinite: true,
        fade:true
    });


});



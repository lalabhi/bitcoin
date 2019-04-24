(function ($, Drupal) {
    'use strict';
 
    Drupal.behaviors.sliderhere = {
      attach: function (context, settings) {
           $('.testimonial_block_slider').slick({
                infinite: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots:true
              });
      },
    };
  })(jQuery, Drupal);
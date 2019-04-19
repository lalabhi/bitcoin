(function ($, Drupal) {
    'use strict';

    Drupal.behaviors.slider = {
        attach: function (context, settings) {
            jQuery(document).ready(function($) {
           // alert("trupti");
            $('.region-content').slick({
                infinite:true,
                dots:true,
                speed:300,
                slidesToShow:1,
                arrows: false,
                appendDots:$(".region-content"),
            })
        });
    },
    };
})(jQuery, Drupal);

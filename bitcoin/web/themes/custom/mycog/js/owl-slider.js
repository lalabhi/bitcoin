(function ($, Drupal){
    Drupal.behaviors.mycog = {
        attach: function (context, settings) {
 
            jQuery(document).ready(function($) {
                // Code that uses jQuery's $ can follow here.
                // $('#block-views-block-news-slider-block-1 .views-view-grid .views-row').slick({
                //     infinite: false,
                //     dots: true,
                //     arrows: false,
                //     fade: true,
                //     slidesToShow: 1,
                //     slidesToScroll: 1,
                //     cssEase: 'linear',
                // });

                // $('.#block-views-block-news-slider-block-1').slick({
                //     slidesToShow: 1,
                //     slidesToScroll: 1,
                //     arrows: false,
                //     fade: true,
                //     asNavFor: '.slider-nav'
                //   });
                //   $('.views-view-grid .views-row').slick({
                //     slidesToShow: 3,
                //     slidesToScroll: 1,
                //     asNavFor: '.#block-views-block-news-slider-block-1',
                //     dots: true,
                //     centerMode: true,
                //     focusOnSelect: true
                //   });
                
 
                // $('.#block-views-block-news-slider-block-1 .views-view-grid').slick({
                //     slidesToShow: 3,
                //     slidesToScroll: 1,
                //     autoplay: true,
                //     autoplaySpeed: 2000,
                //     arrows: true,

                //   });
                $('.#block-views-block-news-slider-block-1 .views-view-grid .views-row').owlCarousel({
                    loop:true,
                    margin:10,
                    responsiveClass:true,
                    responsive:{
                        0:{
                            items:1,
                            nav:true
                        },
                        600:{
                            items:3,
                            nav:false
                        },
                        1000:{
                            items:5,
                            nav:true,
                            loop:false
                        }
                    }
                })
            });
        }
      };
    })(jQuery, Drupal);
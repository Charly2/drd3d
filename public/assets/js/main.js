

(function ($) {
  'use strict';


    //Hide Loading Box (Preloader)
    function handlePreloader() {
      if($('.preloader').length){
        $('.preloader').delay(200).fadeOut(500);
      }
    }

  //define all carousels

   if($.fn.owlCarousel){
      var screens = $(".screens");
      var testimonials = $(".testimonials");
      //active testimonial area carousel
      testimonials.owlCarousel({
        items:2,
        loop:true,
        nav:false,
        margin:30,
        autoplay:false,
        dots:true,
        center:false,
        responsive:{
          0:{
            items:1
          },
          600:{
            items:1
          },
          1000:{
            items:2
          }
        }
      });
      
      // active screen area carousel
      screens.owlCarousel({
         items:4,
          loop:true,
          nav:false,
          margin:30,
          autoplay:false,
          dots:true,
          responsive:{
            0:{
              items:1
            },
            600:{
              items:2
            },
            1000:{
              items:4
            }
          }

      });
    };





  //counter up 
  $('.counter').each(function() {
    var $this = $(this),
        countTo = $this.attr('data-count');
    
    $({ countNum: $this.text()}).animate({
      countNum: countTo
    },

    {

      duration: 8000,
      easing:'linear',
      step: function() {
        $this.text(Math.floor(this.countNum));
      },
      complete: function() {
        $this.text(this.countNum);
        //alert('finished');
      }

    });  
    
  });




  function video_btns(){
        //calling modal video btns
      $(".a-btn3").modalVideo();

      $("#btn_11_video").modalVideo();
      $(".blog_video").modalVideo();
        //modal video btn active
      $(".video_btn").modalVideo({
      });
  };

  video_btns();

     //mobile menu active
      function mobile_menu(){
        $('#menu_nav').slicknav({
        prependTo:'.mobile_menu'
      });
      };

      mobile_menu();

    
      //fixed nav bar active
      function fixed_nav(){
      window.onscroll = function() {myFunction()};

      var header = document.getElementById("header");
      var sticky = header.offsetTop;

      function myFunction() {
        if (window.pageYOffset > sticky) {
          header.classList.add("sticky");
        } else {
          header.classList.remove("sticky");
        }
      }
    };
    fixed_nav();



      



      
    //jquery load function start
    jQuery(window).on("load", function() {
        //preload active
        handlePreloader();

    });
  

}(jQuery));


//console error fixed counter
  function counters(){
      if ($.fn.counterUp) {
        $('.count').counterUp({
            delay: 100,
            time: 2000
        });
    }; 
  };
  counters();


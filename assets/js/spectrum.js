/*!
 * Spectrum v1.2.0 (http://themes.startbootstrap.com/spectrum-v1.2.0)
 * Copyright 2013-2015 Start Bootstrap Themes
 * To use this theme you must have a license purchased at WrapBootstrap (https://wrapbootstrap.com)
 */
 
// Functions to run on document ready
jQuery(document).ready(function() {

    // Find Mobile Devices
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

    // Initialize Stellar.js Parallax
    if (!isMobile.any()) {
        $(window).stellar({
            horizontalScrolling: false,
            verticalOffset: 550,
            horizontalOffset: 0,
            hideDistantElements: false
        });
    }
    
     $(".quotecar").owlCarousel({
        
        navigation: true,
        slideSpeed: 300,
        pagination: false,
        paginationSpeed: 400,
        singleItem: true,
        transitionStyle : "fade",
        navigationText: ["<i id='quotearrows' class='fa fa-arrow-left'></i>", "<i id='quotearrows' class='fa fa-arrow-right'></i>" ]
    });
    
      $('#contactForm input[type="text"]').attr('style', '-webkit-box-shadow: inset 0 0 0 1000px #F4F5F7 !important; -webkit-text-fill-color: #6B7686 !important;');
    $('#contactForm input[type="email"]').attr('style', '-webkit-box-shadow: inset 0 0 0 1000px #F4F5F7 !important; -webkit-text-fill-color: #6B7686 !important;');

    
    $('.demo').progressBar({
        // height of the progress bar
        height : "30",

        // background color
        backgroundColor : "#E0E0E0",

        // progress bar color
        barColor : "#202734",
        
           

        // target bar color
        targetBarColor : "white",

        // display percentage
        percentage : false,

        // enable shadow
        shadow : false,

        // enable border
        border : false,

        // enable animation
        animation : true,

        // animate target bar
        animateTarget : true,
    });

    

    // Activates FitVids jQuery Plugin
    $(".container").fitVids();

    // Activates Magnific Popup jQuery Plugin
    $('.gallery-item').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    // Floating label Headings for the Contact Form
    $("body").on("input propertychange", ".floating-label-form-group", function(e) {
        $(this).toggleClass("floating-label-form-group-with-value", !!$(e.target).val());
    }).on("focus", ".floating-label-form-group", function() {
        $(this).addClass("floating-label-form-group-with-focus");
    }).on("blur", ".floating-label-form-group", function() {
        $(this).removeClass("floating-label-form-group-with-focus");
    });

});

// Functions to run on window load
$(window).load(function() {

    
     $(function(){
      $(".element").typed({
        strings: ["I am Passionate about web design..." , "and Development", "I am a skilled front-end developer...", "with an artistic flair", "nice to meet you"],
        typeSpeed: 25,
          backSpeed: 0,
          	startDelay: 1000,
      });
  });

});

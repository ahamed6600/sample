

    /* .search button click mobile device */
    $('.search-btn').on('click', function () {
        $('.search').slideDown().addClass('active');
    });
    



    $(document).ready(function() {

        $(".sr").click(function() {
           $(".togglesearch").slideDown().toggle();
           $("input[type='text']").focus();
         });
    
    });







(function () {
    'use strict';

    var suhaWindow = $(window);
    var sideNavWrapper = $("#sidenavWrapper");
    var blackOverlay = $(".sidenav-black-overlay");

    // :: Preloader
    suhaWindow.on('load', function () {
        $('#preloader').fadeOut('1000', function () {
            $(this).remove();
        });
    });

    // :: Navbar
    $("#suhaNavbarToggler").on("click", function () {
        sideNavWrapper.addClass("nav-active");
        blackOverlay.addClass("active");
    });

    $("#goHomeBtn").on("click", function () {
        sideNavWrapper.removeClass("nav-active");
        blackOverlay.removeClass("active");
    });

    blackOverlay.on("click", function () {
        $(this).removeClass("active");
        sideNavWrapper.removeClass("nav-active");
    })

    // :: Dropdown Menu
    $(".sidenav-nav").find("li.suha-dropdown-menu").append("<div class='dropdown-trigger-btn'><i class='lni lni-chevron-down'></i></div>");
    $(".dropdown-trigger-btn").on('click', function () {
        $(this).siblings('ul').stop(true, true).slideToggle(700);
        $(this).toggleClass('active');
    });

    // :: Add To Cart Notify
    // $(".add2cart-notify").on("click", function () {
    //     $("body").append("<div class='add2cart-notification animated fadeIn'>Added to cart successfully!</div>");
    //     $(".add2cart-notification").delay(2000).fadeOut();
    // });

    // :: Hero Slides
    if ($.fn.owlCarousel) {
        var welcomeSlider = $('.hero-slides');
        welcomeSlider.owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            dots: true,
            center: true,
            margin: 0,
            nav: true,
            navText: [('<i class="lni lni-chevron-left"></i>'), ('<i class="lni lni-chevron-right"></i>')]
        })

        welcomeSlider.on('translate.owl.carousel', function () {
            var layer = $("[data-animation]");
            layer.each(function () {
                var anim_name = $(this).data('animation');
                $(this).removeClass('animated ' + anim_name).css('opacity', '0');
            });
        });

        $("[data-delay]").each(function () {
            var anim_del = $(this).data('delay');
            $(this).css('animation-delay', anim_del);
        });

        $("[data-duration]").each(function () {
            var anim_dur = $(this).data('duration');
            $(this).css('animation-duration', anim_dur);
        });

        welcomeSlider.on('translated.owl.carousel', function () {
            var layer = welcomeSlider.find('.owl-item.active').find("[data-animation]");
            layer.each(function () {
                var anim_name = $(this).data('animation');
                $(this).addClass('animated ' + anim_name).css('opacity', '1');
            });
        });
    }

    // :: Flash Sale Slides
    if ($.fn.owlCarousel) {
        var flashSlide = $('.flash-sale-slide');
        flashSlide.owlCarousel({
            items: 1,
            margin: 16,
            loop: false,
            autoplay: true,
            smartSpeed: 800,
            dots: false,
            nav: false,
            responsive: {
                1400: {
                    items: 3,
                },
                992: {
                    items: 3,
                },
                768: {
                    items: 2,
                },
                480: {

                    items: 2,
                },
                0: {

                    items: 1.5,
                },
            },
        })
    }

    // :: Products Slides
    if ($.fn.owlCarousel) {
        var productslides = $('.product-slides');
        productslides.owlCarousel({
            items: 1,
            margin: 0,
            loop: false,
            autoplay: true,
            autoplayTimeout: 5000,
            dots: true,
            nav: true,
            navText: [('<i class="lni lni-chevron-left"></i>'), ('<i class="lni lni-chevron-right"></i>')]
        })
    }





  /*---stickey menu---*/
    $(window).on('scroll',function() {    
           var scroll = $(window).scrollTop();
           if (scroll < 100) {
            $(".sticky-header").removeClass("sticky");
           }else{
            $(".sticky-header").addClass("sticky");
           }
    });



     /*---stickey menu---*/
     $(window).on('scroll',function() {    
        var scroll = $(window).scrollTop();
        if (scroll < 100) {
         $(".sticky-search").removeClass("sticky");
        }else{
         $(".sticky-search").addClass("sticky");
        }
 });
 

    












    // :: Jarallax
    if ($.fn.jarallax) {
        $('.jarallax').jarallax({
            speed: 0.5
        });
    }

    // :: Counter Up
    if ($.fn.counterUp) {
        $('.counter').counterUp({
            delay: 150,
            time: 3000
        });
    }

    // :: Prevent Default 'a' Click
    $('a[href="#"]').on('click', function ($) {
        $.preventDefault();
    });

  
    // :: Cart Quantity Button Handler
    $(".quantity-button-handler").on("click", function () {
        var value = $(this).parent().find("input.cart-quantity-input").val();
        if ($(this).text() == "+") {
            var newVal = parseFloat(value) + 1;
        } else {
            if (value > 1) {
                var newVal = parseFloat(value) - 1;
            } else {
                newVal = 1;
            }
        }
        $(this).parent().find("input").val(newVal);
    });

  

    if ($.fn.toast) {
        $('#pwaInstallToast').toast('show');
    }

})();














    // === QTY plus & minus JS === //
    function wcqib_refresh_quantity_increments() {
        jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
            var c = jQuery(b);
            c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
        })
    }
    String.prototype.getDecimals || (String.prototype.getDecimals = function() {
        var a = this,
            b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
        return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
    }), jQuery(document).ready(function() {
        wcqib_refresh_quantity_increments()
    }), jQuery(document).on("updated_wc_div", function() {
        wcqib_refresh_quantity_increments()
    }), jQuery(document).on("click", ".plus, .minus", function() {
        var a = jQuery(this).closest(".quantity").find(".qty"),
            b = parseFloat(a.val()),
            c = parseFloat(a.attr("max")),
            d = parseFloat(a.attr("min")),
            e = a.attr("step");
        b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
    });
    
    
    // === QTY plus & minus JS === //


    $("#fixed-form-container .body").hide();
    $("#fixed-form-container .button").click(function () {
            $(this).next("#fixed-form-container div").slideToggle(400);
            $(this).toggleClass("expanded");
        });



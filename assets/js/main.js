

jQuery(document).ready(function ($) {
            // header fix
            var headerFix = false;

            function fixHeader() {
                if (window.innerWidth > 768) return;
                var posHeader = $(".header").offset()['top'];
                var hHeader = $(".header").outerHeight(true);
                if (posHeader < $(window).scrollTop() && !headerFix) {
                    $('.header').css({
                        'height': hHeader
                    });
                    $('.header__container').addClass('header_fix');
                    headerFix = true;
                }
                if (posHeader > $(window).scrollTop() && headerFix) {
                    $('.header__container').removeClass('header_fix');
                    $('.header').removeAttr('style');
                    headerFix = false;
                }
            }
            $('.mobmenu__menu .menu-item-has-children>a').removeAttr('href');
            $('.mobmenu__subitem > a, .mobmenu__menu .menu-item-has-children>a').on('click', function (e) {
                e.preventDefault();
                $(this).siblings('.mobmenu__sub').slideToggle();
            });
            $('.hamburg').on('click', function () {
                $('.mobmenu').toggleClass('mobmenu_show');
            });
            $('.mobmenu__darken, .mobmenu__close').on('click', function () {
                $('.mobmenu').removeClass('mobmenu_show');
            });

            fixHeader();
            $(window).scroll(fixHeader);
           // $('.woocommerce.widget_price_filter form').addClass('drop-list__content');
           // $('.widget.yith-woocommerce-ajax-product-filter.yith-woo-ajax-navigation>div').addClass('drop-list__title');
         // $('.drop-list ul li a').prepend('<div class="input-checkbox__checkmark"></div>');


         $('.slider-brands').slick({
            arrows: false,
            dots: true,
            speed: 500,
            slidesToShow: 6,
            slidesToScroll: 6,
            adaptiveHeight: true,
            responsive: [{
                breakpoint: 992,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            },
            ]
        });
         $('.woocommerce-product-gallery__image a').removeAttr('href');
        // $('.slider-present').slick({
        //     fade: true,
        //     arrows: false,
        //     dots: true,
        //     autoplay: true,
        //     autoplaySpeed: 5000,
        //     speed: 1000,
        //     adaptiveHeight: true
        // });
    });


// jQuery('.productt').mouseenter(function () {



    jQuery(document).on('mouseenter', '.productt', function () {
        if (window.innerWidth <= 576) return;
        var h = jQuery(this).outerHeight();
        jQuery(this).css({
            height: h
        });
        jQuery(this).find('.product__present').css({
            height: h
        });
        jQuery(this).addClass('product_show');
    })

    jQuery(document).on('mouseleave', '.productt', function () {
        if (window.innerWidth <= 576) return;
        jQuery(this).removeAttr('style');
        jQuery(this).find('.product__present').removeAttr('style');
        jQuery(this).removeClass('product_show');
    });

// jQuery('.drop-list__title').on('click', function () {
//     jQuery(this).siblings('.drop-list__content').slideToggle(function () {
//         jQuery(this).parent('li').toggleClass('drop-list__item-open')
//     });
// });
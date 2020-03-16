if ($("div").is(".cardd")) {
   $('.boutique__more').on('click', function() {
        let content = $('.moreContent');
        content.css('max-height', '100%');
        let fadeout = $('.content__fadeout');
        fadeout.removeClass('content__fadeout');
        $(this).fadeOut(500);
    });
    $(".prices").select2();
    $('.prices').select2({
        tags: "true",
        allowClear: true,
        minimumResultsForSearch: Infinity
    });
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        slidesToShow: 2.99999,
        slidesToScroll: 1,
        asNavFor: '.slider-for',

        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 460,
                settings: {
                    arrows: false,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                }
            },
            {
                breakpoint: 1032,
                settings: {
                    arrows: false,
                }
            },
        ]
    });
    $('.zoomMap').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 300 // don't foget to change the duration also in CSS
        }
    });
    $('.QR').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 200 // don't foget to change the duration also in CSS
        }
    });

    $('.cardd .slider-for').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1]
        },
    });
    if (window.matchMedia("(max-width: 576px)").matches) {
        $("body").swipe({
            swipeLeft: function(event, direction, distance, duration, fingerCount) {
                $(".mfp-arrow-left").magnificPopup("next");
            },
            swipeRight: function(event, direction, distance, duration, fingerCount) {
                $(".mfp-arrow-right").magnificPopup("prev");
            },
            threshold: 50
        });
    }
}

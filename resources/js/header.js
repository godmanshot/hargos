window.axios = require("axios");
// HEADER PRODUCTION CATALOG
$(document).ready(function() {
    let $Catalog = $('#catalog-nav');
    let $Toggle = $('.toggle');
    let defaultData = {
        maxWidth: false,
        customToggle: $Toggle,
        navTitle: 'Каталог',
        levelTitles: true,
        pushContent: '#header',
        insertClose: /*11*/ false,
        labelBack: 'Назад',
       /* labelClose: 'Закрыть',*/
        closeLevels: false
    };
    let Navigation = $Catalog.hcOffcanvasNav(defaultData);
    const update = (settings) => {
        if (Navigation.isOpen()) {
            Navigation.on('close.once', function() {
            Navigation.update(settings);
            Navigation.open();
        });

        Navigation.close();
        }
        else {
        Navigation.update(settings);
            }
        };
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
    
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    $('.burger h3').on('click', function() {
        $('.toggle').trigger('click');
    });
    $('.search-example span').on('click', function() {
        $('.search-field').val($('.search-example span')[0].innerText);
    });
    if (window.matchMedia("(max-width: 576px)").matches) {
        let options = {
            offset: 450,
            offsetSide: 'top',
            classes: {
                clone:   'banner--clone',
                stick:   'banner--stick',
                unstick: 'banner--unstick'
            }
        };
        let banner = new Headhesive('.search-form', options);
        // $(document).on('mousewheel DOMMouseScroll', function(event){
        //     let course = event.originalEvent.wheelDelta;
        //     var scrollPosition = window.scrollY,
        //     showHeaderPosition = 450;
        //     if(course  > 0 && scrollPosition > showHeaderPosition){
        //             console.log("Scroll UP");
        //             $('.search-form').removeClass('banner--stick');
        //             $('.search-form').addClass('banner--unstick');
        //     }
        //     else if(course < 0 && scrollPosition > showHeaderPosition){
        //         console.log("Scroll DOWN");
        //         $('.search-form').removeClass('banner--unstick');
        //         $('.search-form').addClass('banner--stick');
        //     }
        // });
        var lastScrollTop = 0;
        $(window).scroll(function(event){
            var st = $(this).scrollTop();
            var showHeaderPosition = 450;
            var scrollPosition = window.scrollY;
            if (st > lastScrollTop && scrollPosition > showHeaderPosition){
                console.log("Scroll UP");
                $('.search-form').removeClass('banner--stick');
                $('.search-form').addClass('banner--unstick');
            } else if(st < lastScrollTop && scrollPosition > showHeaderPosition){
                console.log("Scroll DOWN");
                $('.search-form').removeClass('banner--unstick');
                $('.search-form').addClass('banner--stick');
            }
            lastScrollTop = st;
        });
    }
    // Headhesive destroy
    // banner.destroy();
});

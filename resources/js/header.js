window.axios = require("axios");
// HEADER PRODUCTION CATALOG
$(document).ready(function() {
    var searchInput = document.querySelectorAll('#predictive_search');
    var activeSearchBtn;
    var timerInterval = 500;
    var searchTimer;
    
    for (const search of searchInput) {
        search.addEventListener('keyup', function() {
            var activeLiveSearch = this.parentNode.nextElementSibling;
            activeSearchBtn = this.nextElementSibling;
            var activeInput = this;
            clearInterval(searchTimer);
            searchTimer = setTimeout(() => showResult(this.value, activeLiveSearch), timerInterval);
        });

        search.addEventListener('keydown', function() {
            clearInterval(searchTimer);
        });
    }

    function showResult(str, lv) {
        if (str.length == 0) {
            lv.innerHTML = "";
            lv.classList.remove('p-2');	
            return;
        }
        axios.get('/api/search-words?word=' + str)
            .then(response => {
                lv.innerHTML = "";
                lv.classList.remove('p-2');	
                for (const wordIndex in response.data) {
                    lv.innerHTML += '<div class="py-2"><a href="javascript:void(0)" style="color: #a39ab4" onclick="addWordToSearchField(\'' + response.data[wordIndex] + '\')">' + response.data[wordIndex] + '</a></div>';
                }

                if(lv.children.length > 0) {
                    lv.classList.add('p-2');
                } else {
                    lv.classList.remove('p-2');
                }
            });
    }

    function addWordToSearchField(word) {
        activeInput.value = word;
        activeLiveSearch.innerHTML = '';
        activeSearchBtn.click();
    }

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
        $(window).scroll(function(event) {
            var st = $(this).scrollTop();
            var showHeaderPosition = 450;
            var scrollPosition = window.scrollY;
            var searchInput = document.querySelectorAll('#predictive_search');
            var activeSearchBtn;
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

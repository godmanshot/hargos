window.axios = require("axios");
// HEADER PRODUCTION CATALOG
window.lang = document.documentElement.lang;

const locales = require('./lang/' + window.lang + '.js').default;
var _app_url = document.head.querySelector('meta[name="app-url"]').content;
var _app_lang = document.head.querySelector('meta[name="app-lang"]').content;
var _app_storage_url = _app_url + '/storage';
var _app_api_url = _app_url + '/api';
window.review = async (boutique_id) => {

    const { value: formValues } = await Swal.fire({
        title: locales.liveAReview,
        html:
            '<p>' + locales.rating + '</p>' +
            '<div class="">'+
            '    <label class="">'+
            '        <input class="swal-input3" type="radio" name="rating" value="1"> 1'+
            '    </label>'+
            '    <label class="">'+
            '        <input class="swal-input3" type="radio" name="rating" value="2"> 2'+
            '    </label>'+
            '    <label class="">'+
            '        <input class="swal-input3" type="radio" name="rating" value="3"> 3'+
            '    </label>'+
            '    <label class="">'+
            '        <input class="swal-input3" type="radio" name="rating" value="4"> 4'+
            '    </label>'+
            '    <label class="">'+
            '        <input class="swal-input3" type="radio" name="rating" value="5" checked> 5'+
            '    </label>'+
            '</div>'+
            '<input id="swal-input1" class="swal2-input" placeholder="'+ locales.name +'"/>' +
            '<textarea id="swal-input2" class="swal2-textarea" placeholder="' + locales.review + '"></textarea>',
        focusConfirm: false,
        preConfirm: () => {
            return [
                document.getElementById('swal-input1').value,
                document.getElementById('swal-input2').value,
                $(".swal-input3:checked").val()
            ]
        }
    })

    if (formValues) {
        fetch(_app_api_url + '/boutique/'+boutique_id+'/reviews/create?' + $.param({name: formValues[0], review: formValues[1], rating: formValues[2]}))
        .then(res => {
            Swal.fire(locales.thanksForAReview);
        });
    }


}
$(document).ready(function() {
    var searchInput = document.querySelectorAll('#predictive_search');
    var activeSearchBtn;
    var timerInterval = 500;
    var searchTimer;
    var activeInput;
    var activeLiveSearch;

    for (const search of searchInput) {
        search.addEventListener('keyup', function() {
            activeLiveSearch = this.parentNode.nextElementSibling;
            activeSearchBtn = this.nextElementSibling;
            activeInput = this;
            
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

    window.addWordToSearchField = function(word) {
        activeInput.value = word;
        activeLiveSearch.innerHTML = '';
        activeSearchBtn.click();
    }

    let $Catalog = $('#catalog-nav');
    let $Toggle = $('.toggle');
    let defaultData = {
        maxWidth: false,
        customToggle: $Toggle,
        navTitle: locales.catalog,
        levelTitles: true,
        pushContent: '#header',
        insertClose: /*11*/ false,
        labelBack: locales.close,
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
        var lastScrollTop = 0;

        $(window).scroll(function(event){
            var scrollPosition = window.scrollY;
            if (scrollPosition < 700 && $('.header .search-form').hasClass('banner--clone')) {
                $('.header .search-form').removeClass('banner--clone');
            }
            var showHeaderPosition = 1000;
            var st = $(this).scrollTop();

            if (st > lastScrollTop && scrollPosition > showHeaderPosition) {
                $('.header .search-form').addClass('banner--clone');
                if ($('.header .search-form').hasClass('banner--unstick')) {
                    $('.header .search-form').removeClass('banner--unstick');
                }
                $('.header .search-form').addClass('banner--stick');
            } else if(st < lastScrollTop && scrollPosition > showHeaderPosition) {
                if ($('.header .search-form').hasClass('banner--stick')) {
                    $('.header .search-form').removeClass('banner--stick');
                }
                $('.header .search-form').addClass('banner--unstick');
            }
            lastScrollTop = st;
        });
    }

    if (window.matchMedia("(max-width: 576px)").matches) {
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

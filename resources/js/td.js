import { filter } from "minimatch";
if ($("div").is(".td")) {
    console.log('qweqwe')
    $('.td-slider').slick({
        slidesToShow: 5.9999,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: true,
        arrows: true,
        responsive: [
            {
                breakpoint: 460,
                settings: {
                    slidesToShow: 1,
                    arrows: false,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                }
            },
            {
                breakpoint: 1032,
                settings: {
                    slidesToShow: 3,
                    arrows: true,
                }
            },
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 4,
                    arrows: true,
                }
            }
        ]
    });


    $('.category-btn').on('click', function() {
        $(this).toggleClass('category-btn__chosen');
        $('.category-btn').not(this).removeClass('category-btn__chosen');
    });

    $('.filter-btn').on('click', function() {
        $(this).toggleClass('filter-btn__chosen');
        $('.filter-btn').not(this).removeClass('filter-btn__chosen');
    });
    if (window.location.pathname.split("/").pop() == "td.php") {
    $('.clear-filter').on('click', function() {
        let filterBtns = document.querySelectorAll('.filter-btn');
        for (let i = 0; i < filterBtns.length; i++) {
            $(filterBtns[i]).removeClass('filter-btn__chosen');
        }
    });
    }

    $('.view-btn').on('click', function() {
        $(this).addClass('active');
        $('.view-btn').not(this).removeClass('active');
    });

    let div = document.createElement('div');

    $('.boutique-block').append('<div></div>');
    console.log($('.boutique-block .container .row a'));
    console.log(div)

    $('.grid-btn').attr("disabled", "disabled");

    $('.list-btn').on('click', function() {
        $('.boutique__container .boutique-block').parent().addClass('col-xl-12  col-lg-12 col-md-12 col-sm-12 col-12').removeClass('col-xl-3');
        $('.boutique__container .boutique-block').wrapInner('<div class="row"></div>');
        $('.boutique__container .boutique-block').wrapInner('<div class="container"></div>');
        $('.boutique__container .boutique-block img').each(function() {
            $(this).siblings().wrapAll('<div class="col-xl-8 col-lg-7 col-md-7 col-sm-12 col-12"><div class="row mt-5"></div></div>');
        });
        $('.boutique__container .boutique-block img').wrap('<div class="col-xl-4 col-lg-5 col-md-5 col-sm-12 col-12"></div>');
        $('.tab-title').addClass('col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4');
        // $('.boutique__container .boutique-block .boutique-header').addClass('<div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-4"></div>');
        // $('.boutique__container .boutique-block .boutique-title').wrap('<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4"></div>');
        $('.boutique__container .boutique-block .star-rating__wrapper ').wrap('<div class="col-xl-4 col-lg-4 col-md-5 col-sm-4 col-4"></div>');
        $('.boutique__container .boutique-block a:last-child ~ p').wrap('<div class="col-xl-6 col-lg-7 col-md-6 col-sm-5 col-5 mt-5"></div>');
        $('.boutique__container .boutique-block a:last-child').wrap('<div class="col-xl-6 col-lg-5 col-md-6 col-sm-7 col-7 mt-5"></div>');
        $('.boutique__container .boutique-block').addClass('boutique-block__list-style');
        $('.boutique-block a:last-of-type').addClass('link-table');
        $('.boutique-block p:last-of-type').wrap('<div class="art"></div>');
        $(this).attr("disabled", "disabled");
        $('.grid-btn').removeAttr('disabled');
    });

    $('.grid-btn').on('click', function() {
        $('.boutique__container .boutique-block').parent().removeClass('col-xl-12  col-lg-12 col-md-12 col-sm-12 col-12').addClass('col-xl-3');
        // $(".boutique__container .boutique-block > .row").contents().unwrap();
        $('.boutique__container .boutique-block img').unwrap();
        $('.boutique__container .boutique-block img').siblings().contents().unwrap();
        $('.boutique__container .boutique-block img').siblings().contents().unwrap();
        $('.boutique__container .boutique-block a + p').unwrap();
        $('.boutique__container .boutique-block .star-rating__wrapper').unwrap();
        $('.boutique__container .boutique-block a').unwrap();
        $('.tab-title').removeClass('col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4');
        // $('.boutique__container .boutique-block .boutique-header').unwrap();
        $('.boutique-block a:last-of-type').removeClass('link-table');
        $('.boutique-block p:last-of-type').removeClass('link-table');

        $('.boutique__container .boutique-block').removeClass('boutique-block__list-style');
        $(this).attr("disabled", "disabled");
        $('.list-btn').removeAttr('disabled');
    });




    $('.footer').css("margin-top", "unset");

}


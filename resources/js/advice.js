
if ($("div").is(".advice")) {
window.lang = document.documentElement.lang;

        const locales = require('./lang/' + window.lang + '.js').default;
    $('.advice-btn').on('click', function () {
        $(this).toggleClass('advice-btn__chosen');
        $('.advice-btn').not(this).removeClass('advice-btn__chosen');
    });

    $('.advice-player').slick({
        slidesToShow: 3.9999,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        swipe: false,
        touchMove: false,
        responsive: [
            {
                breakpoint: 778,
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 832,
                settings: {
                    slidesToShow: 2,
                    arrows: false,
                }
            },
            {
                breakpoint: 1032,
                settings: {
                    slidesToShow: 3,
                }
            }
        ]
    });

    // $('.article__more').on('click', function() {
    //     let content = $('.moreContent');
    //     content.css('max-height', '100%');
    //     let fadeout = $('.content__fadeout');
    //     fadeout.removeClass('content__fadeout');
    //     $(this).fadeOut(500);
    // });
    let articleBtn = document.querySelectorAll('.article__more');
    let articleContent = document.querySelectorAll('.moreContent');
    let articleFadeOut = document.querySelectorAll('.content__fadeout');
    for (let i = 0; i < articleBtn.length; i++) {
        articleBtn[i].onclick = function () {
            articleContent.forEach((content, index) => {
                if (content.classList.contains('block')) {
                    content.classList.remove('block');
                    articleBtn[index].innerHTML = locales.readMore
                }
            })
            articleContent[i].classList.toggle("block");
            articleFadeOut[i].classList.remove('content__fadeout');
            if (this.innerHTML == locales.readMore) {
                this.innerHTML = locales.readLess;
            } else {
                this.innerHTML = locales.readMore;
            };
        }
    };

    // console.log($(articleBtn).text())
}
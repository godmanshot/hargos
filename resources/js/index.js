if ($("div").is(".main")) {
//MAIN GLIDE
$(document).ready(function() {
    new Glide(".background-slider", {
        autoplay: 4000,
        type: 'carousel',
        hoverpause: false,
    }).mount()
    });
//SPECIAL GLIDE
$(document).ready(function() {
    new Glide(".special-slider", {
        autoplay: 4000,
        type: 'carousel',
        hoverpause: false,
    }).mount()
});
window.onscroll = function () {
    if(window.pageYOffset > 4000) {
        document.getElementsByClassName('anchor')[0].classList.add('show');
    }
    else {
        if (document.getElementsByClassName('anchor')[0].classList.contains('show')) {
            document.getElementsByClassName('anchor')[0].classList.remove('show');
        }
    }
}
$('.geek-recommendation').slick({
    slidesToShow: 3.9999,
    slidesToScroll: 1,
    autoplay: 4000,
    autoplaySpeed: 2000,
    prevArrow: $('.geek-recommendation__control-panel .prev'),
    nextArrow: $('.geek-recommendation__control-panel .next'),
    responsive: [
        {
            breakpoint: 460,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 778,
            settings: {
                slidesToShow: 2,
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
$('.category-discounts__slick-01').slick({
    slidesToShow: 2.9999,
    slidesToScroll: 1,
    autoplay: 4000,
    autoplaySpeed: 2000,
    arrows: false,
    responsive: [
        {
            breakpoint: 460,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 778,
            settings: {
                slidesToShow: 2,
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
$('.category-discounts__slick-02').slick({
    slidesToShow: 2.9999,
    slidesToScroll: 1,
    autoplay: 4000,
    autoplaySpeed: 2000,
    arrows: false,
    responsive: [
        {
            breakpoint: 460,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 778,
            settings: {
                slidesToShow: 2,
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
$('.category-discounts__control-panel .prev').click(function() {
    $('.category-discounts__slick-01, .category-discounts__slick-02').slick('slickPrev');
});

$('.category-discounts__control-panel .next').click(function() {
    $('.category-discounts__slick-01, .category-discounts__slick-02').slick('slickNext');
});
$('.top-products__slick-01').slick({
    slidesToShow: 5.9999,
    slidesToScroll: 1,
    autoplay: 4000,
    autoplaySpeed: 2000,
    arrows: false,
    responsive: [
        {
            breakpoint: 460,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 778,
            settings: {
                slidesToShow: 2,
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
$('.top-products__slick-02').slick({
    slidesToShow: 5.9999,
    slidesToScroll: 1,
    autoplay: 4000,
    autoplaySpeed: 2000,
    arrows: false,
    responsive: [
        {
            breakpoint: 460,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 778,
            settings: {
                slidesToShow: 2,
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
$('.top-products__control-panel .prev').click(function() {
    $('.top-products__slick-01, .top-products__slick-02').slick('slickPrev');
});

$('.top-products__control-panel .next').click(function() {
    $('.top-products__slick-01, .top-products__slick-02').slick('slickNext');
});
$('.popular-products__slick').slick({
    slidesToShow: 3.99999,
    slidesToScroll: 1,
    autoplay: 4000,
    autoplaySpeed: 2000,
    prevArrow: $('.popular-products__control-panel .prev'),
    nextArrow: $('.popular-products__control-panel .next'),
    responsive: [
        {
            breakpoint: 460,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 778,
            settings: {
                slidesToShow: 2,
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
$('.about-us__slick').slick({
    slidesToShow: 3.9999,
    slidesToScroll: 1,
    autoplay: 4000,
    autoplaySpeed: 2000,
    prevArrow: $('.about-us__control-panel .prev'),
    nextArrow: $('.about-us__control-panel .next'),
    responsive: [
        {
            breakpoint: 460,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 778,
            settings: {
                slidesToShow: 2,
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
$('.freebie__slick').slick({
    slidesToShow: 3.9999,
    slidesToScroll: 1,
    autoplay: 4000,
    autoplaySpeed: 2000,
    prevArrow: $('.freebie__control-panel .prev'),
    nextArrow: $('.freebie__control-panel .next'),
    responsive: [
        {
            breakpoint: 460,
            settings: {
                slidesToShow: 1,
            }
        },
        {
            breakpoint: 778,
            settings: {
                slidesToShow: 2,
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
}
else if ($("div").is(".cardd") || $("div").is(".contact") || $("div").is(".tour") || $("div").is(".td") || $("div").is(".reviews") || $("div").is(".news")) {
    if (window.matchMedia("(max-width: 576px)").matches) {
         $('.favorite__slick').slick({
            autoplay: 4000,
            autoplaySpeed: 2000,
            arrows: false,
            responsive: [
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2,
                    }
                }
            ]
          });
          $('.recommended__slick').slick({
            autoplay: 4000,
            autoplaySpeed: 2000,
            arrows: false,
            responsive: [
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2,
                    }
                }
            ]
          });
          
          $('.similar__slick').slick({
            autoplay: 4000,
            autoplaySpeed: 2000,
            arrows: false,
            responsive: [
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 1,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 2,
                    }
                }
            ]
          });
    }
}

if ($("div").is(".tour")) {
    const appUrl = document.querySelector('meta[name=app-url]').content;
    $(".clear-filter").click(function() {
        $(".countries").select2('val', 'All');
        $(".cities").select2('val', 'All');
        $(".cities").attr("disabled", "true");
        document.getElementsByClassName("isCity")[0].innerText = "Алматы";
        wrongClicked = false;
        axios.get(`${appUrl}/api/tour-operators?country_id=1&&city_id=1`)
            .then(function (response) {
                drawProducts(response);
                boutiqueClick();
            });
    });
    window.onload = function(e) {

        axios.get(`${appUrl}/api/tour-operators?country_id=1&&city_id=1`)
            .then(function (response) {
                drawProducts(response);
                boutiqueClick();
                slickNavFor();
                slickPlayer();
            });

        $('.cities').select2();
        $(".cities").select2({
            placeholder: "Город",
            allowClear: true,
            minimumResultsForSearch: Infinity,
            width: '100%',
        });
        $('.countries').select2({
            placeholder: "Страна",
            allowClear: true,
            minimumResultsForSearch: Infinity,
            width: '100%',
            ajax: {
                url: `${appUrl}/api/countries`,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });
        axios.get(`${appUrl}/api/tour-operators?country_id=1&&city_id=1`)
            .then(function (response) {
                drawProducts(response);
                boutiqueClick();
                slickNavFor();
                slickPlayer();
            });
            axios.get(`${appUrl}/api/tour-operators?country_id=1&&city_id=1&&id=1`)
                .then(function (response) {
                    drawBoutique(response);
                });
    }
    $('.countries').on('select2:select', function(e) {
        $('.cities').removeAttr('disabled');
        $(".cities").select2("destroy").select2({
            placeholder: "Город",
            allowClear: true,
            minimumResultsForSearch: Infinity,
            width: '100%',
            ajax: {
                url: `${appUrl}/api/cities?country_id=${$('.countries').val()}`,
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });
    });
    $('.cities').on('select2:select', function() {
        document.getElementsByClassName("isCity")[0].innerText = document.getElementsByClassName("select2-selection__rendered")[1].innerText;
        axios.get(`${appUrl}/api/tour-operators?country_id=${$('.countries').val()}&&city_id=${$(this).val()}`)
            .then(function (response) {
                drawProducts(response);
                boutiqueClick();
                drawBoutique(response);
            });
    });
    $('.rightCity').on('click', function() {
        $('.filters-answer__block').addClass('hide');
        $('.yourLocation').removeClass('show');
        axios.get(`${appUrl}/api/tour-operators?country_id=1&&city_id=1`)
            .then(function (response) {
                drawProducts(response);
                boutiqueClick();
            });
            axios.get(`${appUrl}/api/tour-operators?country_id=1&&city_id=1&&id=1&&id=1`)
                .then(function (response) {
                    drawBoutique(response);
                });
    });
    let wrongClicked = false;
    $('.wrongCity').on('click',function() {
        $('.yourLocation').addClass('show');
        $('.filters-confirm__block').addClass('hide');
        $('.cities').attr("disabled", "true");
        wrongClicked = true;
    });




    function slickPlayer() {
        $('.about-player').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 2000,
            swipe: false,
            touchMove: false,
            lazyLoad: "ondemand",
        });
    }
    function slickNavFor() {
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
    }
    function drawProducts(products){
        document.getElementById("boutique__products").innerHTML = "";
        for (product of products.data) {
            let boutiqueWrapper = document.createElement("div");
            boutiqueWrapper.className = 'col-xl-3 col-lg-4 col-md-4 col-sm-6';
            let boutiqueBlock = document.createElement("div");
            boutiqueBlock.className = 'boutique-block';
            boutiqueBlock.setAttribute('id', product.id);
            let imgWrapper = document.createElement("div");
            imgWrapper.className = 'boutique-img__wrapper';
            let boutiqueImg = document.createElement("img");
            boutiqueImg.src = "http://dai5.kz/storage/" + product.logo;
            let borderBottom = document.createElement("div");
            borderBottom.className = 'separator';
            let boutiqueTitle = document.createElement("h2");
            boutiqueTitle.innerText = product.name;
            let ratingTitle = document.createElement("p");
            ratingTitle.innerText = "Рейтинг:";
            let rating = document.createElement("div");
            rating.className = 'star-rating__wrapper';
            let j = 5;
            for (let i = 0; i < 5; i++) {

                let ratingStars;
                let ratingStarsInputs;
                ratingStars = document.createElement("label");
                ratingStars.className = 'star-rating__ico star-rating__hover fa fa-star fa-lg';
                ratingStarsInputs = document.createElement('input');
                ratingStarsInputs.className = 'star-rating__input';
                ratingStarsInputs.setAttribute('type', 'radio');
                ratingStarsInputs.setAttribute('name', "rating");
                ratingStarsInputs.setAttribute('value', j);
                rating.appendChild(ratingStars);
                ratingStars.appendChild(ratingStarsInputs);
                j--;
            }
            document.getElementById("boutique__products").appendChild(boutiqueWrapper);
            boutiqueWrapper.appendChild(boutiqueBlock);
            boutiqueBlock.appendChild(imgWrapper);
            imgWrapper.appendChild(boutiqueImg);
            boutiqueBlock.appendChild(borderBottom);
            boutiqueBlock.appendChild(boutiqueTitle);
            boutiqueBlock.appendChild(ratingTitle);
            boutiqueBlock.appendChild(rating);
        }
    }
    function drawBoutique(boutique) {
        const productInfo = document.getElementById("product__info");
        const tourProgramContent = document.getElementById("tour__program-content");
        if(productInfo) {
            productInfo.innerHTML = "";
        }
        if(tourProgramContent) {
            tourProgramContent.innerHTML = "";
        }
        for (let boutiqueInfo of boutique.data) {
            let sliderWrapper = document.createElement("div");
            sliderWrapper.className = 'col-xl-5 col-md-6';
            let infoWrapper = document.createElement("div");
            infoWrapper.className = 'col-xl-7 col-md-6 pl-3';
            let tourInfo = document.createElement("div");
            tourInfo.className = 'tour__info';
            tourInfo.innerHTML += boutiqueInfo.title;
            tourInfo.innerHTML += boutiqueInfo.description;
            let tourInfoBtn = document.createElement("button");
            tourInfoBtn.className = 'signUp';
            tourInfoBtn.innerText ='Записаться в группу можно';
            tourInfoBtn.setAttribute("type","button");
            tourInfo.appendChild(tourInfoBtn);
            let tourContacts = document.createElement("div");
            tourContacts.className = 'tour__info-contacts';
            tourInfo.appendChild(tourContacts);
            for(let j = 0; j < 2; j++) {
                let tourContactUls;
                tourContactUls = document.createElement("ul");
                for (let k = 0; k < 2; k++) {
                    let tourContactLis;
                    tourContactLis = document.createElement("li");
                    tourContactUls.appendChild(tourContactLis);
                }
                tourContacts.appendChild(tourContactUls);
            }
            tourContacts.childNodes[0].childNodes[0].innerText = boutiqueInfo.phone_name_1;
            tourContacts.childNodes[0].childNodes[1].innerHTML = ("<a href='https://wa.me/"+boutiqueInfo.phone_1.replace(/[+()-/\s]/g, "")+"'>"+boutiqueInfo.phone_1+"</a>");
            tourContacts.childNodes[1].childNodes[0].innerText = boutiqueInfo.phone_name_2;
            tourContacts.childNodes[1].childNodes[1].innerHTML =("<a href='https://wa.me/"+boutiqueInfo.phone_2.replace(/[+()-/\s]/g, "")+"'>"+boutiqueInfo.phone_2+"</a>");
            tourInfo.innerHTML += boutiqueInfo.content;

            let sliderFor = document.createElement("div");
            sliderFor.className = 'slider slider-for';
            let sliderNav = document.createElement("div");
            sliderNav.className = 'slider slider-nav';
            let imgSrc = JSON.parse(boutiqueInfo.images);
            for (let i = 0; i < imgSrc.length; i++) {
                let sliderForDiv;
                let sliderForImg;
                sliderForDiv = document.createElement("div");
                sliderForImg = document.createElement("img");
                sliderForImg.src = `${appUrl}/storage/` + imgSrc[i];
                sliderForDiv.appendChild(sliderForImg);
                sliderFor.appendChild(sliderForDiv);
            }
            for (let i = 0; i < imgSrc.length; i++) {
                let sliderNavDiv;
                let sliderNavImg;
                sliderNavDiv = document.createElement("div");
                sliderNavImg = document.createElement("img");
                sliderNavImg.src = `${appUrl}/storage/` + imgSrc[i];
                sliderNavDiv.appendChild(sliderNavImg);
                sliderNav.appendChild(sliderNavDiv);
            }
            infoWrapper.appendChild(tourInfo);
            sliderWrapper.appendChild(sliderFor);
            sliderWrapper.appendChild(sliderNav);
            document.getElementById("product__info").appendChild(sliderWrapper);
            document.getElementById("product__info").appendChild(infoWrapper);

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
            if ($('div').is('#tour__program-content')) {
                document.getElementById("tour__program-content").innerHTML += boutiqueInfo.tour_content;
            }
            let schedule = document.getElementsByClassName("schedule__right-block");
            console.log(schedule);
            for (let j = 0; j < schedule.length; j++) {
                schedule[j].innerHTML = '';
            }
            for (let k = 0; k < schedule.length; k++) {
                schedule[k].innerHTML += "<h1>"+boutiqueInfo.sheldures[k].title + "</h1>";
                schedule[k].innerHTML += "<div class='schedule__content-wrapper'></div>";
                schedule[k].children[1].innerHTML += "<h2>Дата выезда</h2>";
                schedule[k].children[1].innerHTML +=   boutiqueInfo.sheldures[k].dates;
                schedule[k].children[1].innerHTML += "<div class='separator'></div>";
                schedule[k].children[1].innerHTML += "<p>Стоимость поездки:</p>";
                schedule[k].children[1].innerHTML += "<h3>" + boutiqueInfo.sheldures[k].price + '<sup>тг.</sup>' + "</h3>";
                schedule[k].children[1].innerHTML += "<p>Сбор группы:</p>";
                schedule[k].children[1].innerHTML += "<h3>" + boutiqueInfo.sheldures[k].times + "</h3>";
                schedule[k].children[1].innerHTML += "<p>" +  boutiqueInfo.sheldures[k].periods + "</p>";
                schedule[k].children[1].innerHTML += "<div class='separator'></div>";
                schedule[k].children[1].innerHTML += "<p>" + boutiqueInfo.sheldures[k].address + "</p>";
                schedule[k].children[1].innerHTML += "<div class='bottom__line'></div>"
            }
            // let sliderFor = document.createElement("div");
            // sliderFor.className = 'slider slider-for';

            document.getElementsByClassName("tour__program")[0].children[0].children[1].innerHTML = boutiqueInfo.tour_description;
            document.getElementById("gmap_canvas").src = "https://maps.google.com/maps?q=" + boutiqueInfo.coordinates +"&z=13&ie=UTF8&iwloc=&output=embed";

            let aboutPlayer = document.getElementsByClassName("about-player");
            aboutPlayer[0].innerHTML = "";
            let aboutPlayerDivs = document.createElement("div");
            for (let i = 0; i < boutiqueInfo.slider.length; i++) {
                aboutPlayer[0].appendChild(aboutPlayerDivs);
                aboutPlayerDivs.innerHTML = boutiqueInfo.slider[i].video;
            }
            $('.about-player').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: false,
                autoplaySpeed: 2000,
                swipe: false,
                touchMove: false,
                lazyLoad: "ondemand",
            });
        }
    }
    function boutiqueClick() {
        $('.boutique-block').on('click', function(e) {
            if(event.target == event.currentTarget) {
                if (wrongClicked) {
                    axios.get(`${appUrl}/api/tour-operators?country_id=${$('.countries').val()}&&city_id=${$('.cities').val()}&&id=${$(this).attr('id')}`)
                        .then(function (response) {
                            drawBoutique(response);
                        });
                }
                else {
                    axios.get(`${appUrl}/api/tour-operators?country_id=${$('.select2').val()}&&city_id=${$('.select2').val()}&&id=${$(this).attr('id')}`)
                        .then(function (response) {
                            drawBoutique(response);
                        });
                }
            }
        });
    }
}


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



if ($("div").is(".about")) {
    window.lang = document.documentElement.lang;
    const locales = require('./lang/' + window.lang + '.js').default;
    const appUrl = document.querySelector('meta[name=app-url]').content;
    $('input[type="tel"]').mask('+79999999999');
    $('.about-player').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2000,
        swipe: false,
        touchMove: false,
        lazyLoad: "ondemand",
    });
    $('.getConsultation').on('click', function() {
        Swal.fire({
            title: locales.enterPhoneNumber,
            input: 'tel',
            inputPlaceholder: locales.enterPhoneNumber,
            preConfirm: (phone) => {
                return axios.post(`${appUrl}/api/consultations`, {phone}, {
                    headers: {
                        'X-localization': window.lang
                    }
                })
                    .then(response => response.data)
                    .catch(error => {
                        Swal.showValidationMessage(
                            `Request failed: ${error}`
                        )
                    });
            },
            allowOutsideClick: () => !Swal.isLoading()
        }).then(data => {
            Swal.fire({
                title: data.value.message
            });
        });
    });
}

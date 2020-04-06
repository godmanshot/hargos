
if ($("div").is(".about")) {
    const appUrl = document.querySelector('meta[name=app-url]').content;
    $('.input[type="tel"]').mask('+79999999999');
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
            title: 'Введите номер телефона',
            input: 'tel',
            inputPlaceholder: 'Введите номер телефона',
            preConfirm: (phone) => {
                return axios.post(`${appUrl}/api/consultations`, {phone})
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

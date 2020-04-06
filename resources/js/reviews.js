if ($("div").is(".reviews")) {
    for (let i = 0; i < $('.avatar__wrapper').length; i++) {
        $('.avatar__wrapper')[i].classList.add("avatar__bg")
    }
    $('.leave__review-wrapper .star-rating__input').on('click', function() {
        $(this).parent('label').nextAll('label').addClass('star-rating__checked');
        $(this).parent('label').prevAll('label').removeClass('star-rating__checked');
        $(this).nextAll('.leave__review-wrapper .star-rating__input').trigger('click');
        $(this).parent('label').addClass('star-rating__checked');
    });
}

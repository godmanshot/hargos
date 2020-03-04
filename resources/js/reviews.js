if ($("div").is(".reviews")) {
    for (i = 0; i < $('.avatar__wrapper').length; i++) {
        if ($(".avatar__wrapper img")[i].currentSrc != "") {
            $('.avatar__wrapper')[i].classList.remove("avatar__bg")
        }
        else {
            $('.avatar__wrapper')[i].classList.add("avatar__bg")
        }
    }
    $('.leave__review-wrapper .star-rating__input').on('click', function() {
        $(this).parent('label').nextAll('label').addClass('star-rating__checked');
        $(this).parent('label').prevAll('label').removeClass('star-rating__checked');
        $(this).nextAll('.leave__review-wrapper .star-rating__input').trigger('click');
        $(this).parent('label').addClass('star-rating__checked');
    });
}

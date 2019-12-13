
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

import './bootstrap';
import Swal from 'sweetalert2'
// import './components/TradingHouses';
// import { createStore } from 'redux';

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

var _app_url = document.head.querySelector('meta[name="app-url"]').content;
var _app_lang = document.head.querySelector('meta[name="app-lang"]').content;
var _app_storage_url = _app_url + '/storage';
var _app_api_url = _app_url + '/api';

let edit_class = process.env.MIX_EDITABLE_BLOCK_CLASS;

window.adminEdit = function() {
    $("."+edit_class).each(function() {
        let id = $(this).data('edit-id');
        let url = _app_url + '/admin/blocks/' + id + '/edit';
    
        $(this).append("<a class='edit' href='"+url+"'>Редактировать</a>");
        $(this).css('border', '1px solid black');
    });
}

window.filterInitial = {};
window.filter = {};

window.boutiquesInTradingHousesFilter = function(filter) {
    window.filter = {...window.filter, ...filter};

    window.boutiquesInTradingHouses();
};

window.boutiquesInTradingHousesFilterClear = function() {
    window.filter = window.filterInitial;

    window.boutiquesInTradingHouses();
};

window.renderRating = function(rating) {
    rating = rating.rating;

    let html = '';
    html += '<div class="star-rating__wrapper">';
    html += '    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg '+(rating>=5 ? 'star-rating__checked' : '')+'">';
    html += '        <input class="star-rating__input" type="radio" name="rating" value="5">';
    html += '    </label>';
    html += '    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg '+(rating>=4 ? 'star-rating__checked' : '')+'">';
    html += '        <input class="star-rating__input" type="radio" name="rating" value="4">';
    html += '    </label>';
    html += '    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg '+(rating>=3 ? 'star-rating__checked' : '')+'">';
    html += '        <input class="star-rating__input" type="radio" name="rating" value="3">';
    html += '    </label>';
    html += '    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg '+(rating>=2 ? 'star-rating__checked' : '')+'">';
    html += '        <input class="star-rating__input" type="radio" name="rating" value="2">';
    html += '    </label>';
    html += '    <label class="star-rating__ico star-rating__hover fa fa-star fa-lg '+(rating>=1 ? 'star-rating__checked' : '')+'">';
    html += '        <input class="star-rating__input" type="radio" name="rating" value="1">';
    html += '    </label>';
    html += '</div>';

    console.log(html);
    return html;
};

window.renderContent = function(data) {
    
    $('#content').empty();
    $('#content').append('<div class="about-boutique__container">' +
    '    <div class="row">' +
    '        <div class="col-xl-4 col-lg-5 col-md-5 col-sm-12 col-12 about-boutique__img-wrapper">' +
    '            <img src="' + _app_storage_url + '/' + data.firstImage + '">' +
    '        </div>' +
    '        <div class="col-xl-8 col-lg-7 col-md-7 col-sm-12 col-12 about-boutique__info-wrapper">' +
    '            <div class="row align-items-end">' +
    '                <div class="col-xl-2 col-lg-4 col-md-3 col-sm-4 col-4">' +
    '                    <h1 class="boutique-header">' + data.name +'</h1>' +
    '                </div>' +
    '                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-4">' +
    '                    <p class="boutique-title">' + data.categoriesName + '</p>' +
    '                </div>' +
    '                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-4 col-4">' +
                        renderRating(data.averageRating) + 
    '                </div>' +
    '                <div class="col-xl-5">' +
    '                </div>' +
    '            </div>' +
    '            <div class="row mt-3">' +
    '                <div class="col-xl-12 col-lg-11 col-md-12 col-sm-12 col-12">' +
    '                    <p>' +
    '                    Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей. Текст генерируется абзацами случайным образом от двух до десяти предложений в абзаце' +
    '                    </p>' +
    '                </div>' +
    '            </div>' +
    '            <div class="row align-items-center mt-3">' +
    '                <div class="col-xl-3 col-lg-5 col-md-6 col-sm-7 col-7">' +
    '                    <a href="' + _app_url + '/boutique/' + data.id  + '">Перейти в бутик</a>' +
    '                    <span class"favorite" data-boutique_id="'+data.id+'"></span>'+
    '                </div>' +
    '                <div class="col-xl-3 col-lg-7 col-md-6 col-sm-5 col-5">' +
    '                    <p>Артикул: ' + data.id + '</p>' +
    '                </div>' +
    '                <div class="col-xl-6"></div>' +
    '            </div>' +
    '        </div>' +
    '    </div>' +
    '</div>');

};

window.boutiquesInTradingHouses = function() {

    fetch(_app_api_url + '/boutiques?' + $.param(window.filter))
    .then(res => res.json())
    .then(
      (data) => {
        $('#boutiquesInTradingHouses').empty();
        data.map((model) => {
            let cont = $('<div>');
            cont.attr('class', 'col-xl-3 col-lg-4 col-md-4 col-sm-6');
            cont.append(
            '    <div class="boutique-block">' +
            '        <img src="' + _app_storage_url + '/' + model.firstImage + '">' +
            '        <h3 class="boutique-header">' + model.name +'</h3>' +
            '        <p class="boutique-title">' + model.categoriesName + '</p>' +
                    renderRating(model.averageRating) + 
            '        <a href="' + _app_url + '/boutique/' + model.id  + '">Перейти в бутик</a>' +
            '        <p>Артикул: ' + model.id + '</p>' +
            '    </div>'
            );

            cont.click(() => {
                window.renderContent(model);
            });
    
            $('#boutiquesInTradingHouses').append(cont);
        });
    });
};

$(".filter-by-category").click(function() {
    boutiquesInTradingHousesFilter({category: $(this).data('category-id')});
});

$('#filter-by-popular').click(() => {
    boutiquesInTradingHousesFilter({sort: 'popular'});
});

$('#filter-by-top').click(() => {
    boutiquesInTradingHousesFilter({sort: 'top'});
});

$('#filter-by-discount').click(() => {
    boutiquesInTradingHousesFilter({sort: 'stock'});
});

$('#filter-by-new').click(() => {
    boutiquesInTradingHousesFilter({sort: 'new'});
});

$('#filter-clear').click(() => {
    boutiquesInTradingHousesFilterClear();
});

window.review = async (boutique_id) => {

    const { value: formValues } = await Swal.fire({
        title: 'Оставьте свой отзыв',
        html:
            '<p>Рейтинг</p>' +
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
            '<input id="swal-input1" class="swal2-input" placeholder="Имя"/>' +
            '<textarea id="swal-input2" class="swal2-textarea" placeholder="Отзыв"></textarea>',
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
            Swal.fire("Спасибо за отзыв!");
        });
    }


}

$('#create-review').click(function() {
    var boutique_id = $(this).data('boutique_id');
    review(boutique_id);
});

var favorites = () => {
    $('.favorite').each(function() {
        
    });
};
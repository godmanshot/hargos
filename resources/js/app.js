
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
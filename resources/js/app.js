
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

import './bootstrap';

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import './components/Example';

let edit_class = process.env.MIX_EDITABLE_BLOCK_CLASS;

$("."+edit_class).each(function() {
    let id = $(this).data('edit-id');
    let url = process.env.MIX_APP_URL + '/admin/blocks/' + id + '/edit';

    $(this).append("<a href='"+url+"' style='position: absolute;top: 0;background-color: rgba(0, 0, 0, 0.3);padding: 5px;left: 0;'>Редактировать</a>");
    $(this).css('border', '1px solid black');
});

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */
try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    // BOOTSTRAP COMPONENTS
    window.app = require('./_bootstrap/index.js');
} catch (e) {
    console.log(e)
}


// MODAL WINDOW
$(function () {

    $('.is-modal').on('click', function () {

        var data = $(this).data();

        if (data.url) {
            $.ajax({
                url: data.url,
                success: function(result){
                    return data.result = result;
                }
            });
        }

        app.ModalControl.ModalProcess({title: data.title, body: data.result});

    });

});



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
    // MODAL WINDOW
    require('./_bootstrap/modal-control');
    require('./kube');


    // AJAX X-CSRF-TOKEN
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
} catch (e) {
    console.log(e)
}







// LIKE SYSTEM
$(document).on('click', '.component-likes__button', function () {
    var that_main = $(this).parent();
    var data      = $(this).data();
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data: data,
        type: 'POST',
        url: '/like_handler',
        success: function (result) {
            that_main.find('.component-likes__count').text(result.like_count);
            if (result.liked === true) {
                that_main.find('.component-likes__button').removeClass('like--false').addClass('like--true');
            } else {
                that_main.find('.component-likes__button').removeClass('like--true').addClass('like--false');
            }
        }
    });
    event.preventDefault();
});




// // MODAL WINDOW

$(function () {

    $('.is-modal').on("click", function () {
        modal.alert('', '', function() {
            console.log('Alert window closed.');
        });
    });

    $('.is-modal-ajax').on("click", function (event) {

        let data = $(this).data();
        if (data.url) {
            event.preventDefault();

            $.ajax({
                url: data.url,
                success: function (request) {
                    if (request)
                        modal.ajax(request, data.title);
                }
            });
        }
    });
});




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
    window.modal  = {
        /**
         * Show window. Core function.
         *
         * @param {Object} params - Window parameters.
         * @param {string} params.title - Window title.
         * @param {string} params.message - Window message.
         * @param {boolean} params.animate - Window animation. Default true.
         * @param {boolean} params.large - Window large width. Default false.
         * @param {boolean} params.small - Window small width. Default false.
         * @param {boolean} params.closeable - Window closeable. Default true.
         * @param {Array} params.buttons - Array of button objects. Optional.
         *                                 See below.
         * @param {function} params.onAppear - Fires when window DID appear.
         *                                     Parameter will be cbParams (see below).
         *                                     Optional.
         * @param {function} params.onDisappear - Fires when window DID disappear.
         *                                        Parameter wil be cbParams
         *                                        (see below). Optional.
         *
         *
         * Button object parameters:
         * @param {string} label - Label of buttton.
         * @param {string} className - Additional CSS class name of button.
         *                             Default: 'btn-secondary'.
         * @param {function} action - Fired on click. Optional. Argument
         *                            will be cbParams object (see below).
         *
         * cbParams object definition:
         * @typedef {Object} cbParams
         * @property {Object} element - DOM element of dialog window itself.
         * @property {function} close - Close window function.
         */
        show: function (params) {
            // Default settings:
            var settings = {
                title: 'Window',
                message: '',
                animate: true,
                large: false,
                small: false,
                closeable: true,
                buttons: [],
                onAppear: function () {
                },
                onDisappear: function () {
                }
            };
            $.extend(settings, params);

            // Close button template:
            var closeButton = [
                '<button type="button"',
                ' class="close" data-dismiss="modal" aria-label="Close">',
                '  <span aria-hidden="true">&times;</span>',
                '</button>'
            ].join('');
            if (!settings.closeable) closeButton = '';

            // Main template:
            var template = [
                '<div class="modal' + (settings.animate ? ' fade' : '') + '"',
                ' tabindex="-1" role="dialog">',
                '  <div class="modal-dialog',
                (settings.large ? ' modal-lg' : '') + (settings.small ? ' modal-sm' : ''),
                '" role="document">',
                '   <div class="modal-content">',
                '     <div class="modal-header">',
                '       <h5 class="modal-title">' + settings.title + '</h5>',
                closeButton,
                '     </div>',
                '     <div class="modal-body">' + settings.message + '</div>',
                '   </div>',
                ' </div>',
                '</div>'
            ].join('');

            var element = $(template);

            // Callback parameters:
            var cbParams = {
                element: element,
                close: function () {
                    $(element).modal('hide');
                }
            };

            /**
             * Create one button with parameters.
             * @param {object} footer - Footer element of window to add button.
             * @param {Object} btn    - Button object.
             * @param {string} btn.label - The title of button.
             * @param {function} btn.action - Callback function of click on button.
             *                                Parameter is cbParams object.
             *                                See above. Optional.
             * @param {string} btn.className - Class name of button object
             *                                 (default: 'btn-secondary'). Optional.
             *
             * @example
             * createButton(document.body, {
             *   label: "String",
             *   action: function(parameters) {},
             *   className: "Class name; default 'btn-secondary'"
             * });
             */
            function createButton(footer, btn) {
                var template = [
                    '<button class="btn',
                    (btn.className ? ' ' + btn.className : ' btn-secondary'),
                    '">' + btn.label + '</button>'
                ].join('');

                var btnInstance = $(template);

                if (btn.action) {
                    $(btnInstance).click(function () {
                        btn.action(cbParams);
                    });
                }

                $(footer).append(btnInstance);
            } // createButton();

            // Adding buttons:
            if (settings.buttons.length > 0) {
                var footer = $('<div class="modal-footer"></div>');

                for (var i = 0; i < settings.buttons.length; i++) {
                    createButton(footer, settings.buttons[i]);
                }

                $(element).find('.modal-content:eq(0)').append(footer);
            }

            // Hanging events:
            $(element).on('shown.bs.modal', function (e) {
                settings.onAppear(cbParams);
            });
            $(element).on('hidden.bs.modal', function (e) {
                settings.onDisappear(cbParams);

                $(this).modal('dispose');
                $(this).remove();
            });

            // Finally, show modal:
            if (settings.closeable) {
                $(element).modal();
                return;
            }

            // If not closeable:
            $(element).modal({
                backdrop: 'static',
                keyboard: false
            });
        },
        /**
         * Show alert messsage, similar to native javascript alert window.
         *
         * @param {string} text - Alert message.
         * @param {string} title - Title of alert message. Optional.
         * @param {function} cb - Callback. Optional.
         */
        alert: function (text, title, cb) {
            this.show({
                message: text,
                title: (title ? title : 'Alert'),
                buttons: [
                    {
                        label: 'OK',
                        className: 'btn-primary',
                        action: function (instance) {
                            instance.close();
                        }
                    }
                ],
                onDisappear: (cb ? cb : function () {
                })
            });
        },
        /**
         * Show confirm message, similar to native javacsript confirm function.
         *
         * @param {string} text - Confirm message text.
         * @param {string} fifle - Confirm message title. Optional.
         * @param {function} cb - Callback function with result in argument. Optional.
         */
        confirm: function (text, title, cb) {
            this.show({
                message: text,
                title: (title ? title : 'Confirm'),
                closeable: false,
                buttons: [
                    {
                        label: 'OK',
                        className: 'btn-primary',
                        action: function (instance) {
                            instance.close();
                            cb(true);
                        }
                    },
                    {
                        label: 'Cancel',
                        action: function (instance) {
                            instance.close();
                            cb(false);
                        }
                    }
                ]
            });
        },
        /**
         * Show prompt message, similar to native javascript prompt function.
         *
         * @param {string} text - Confirm message text.
         * @param {string} value - Default value of text field.
         * @param {string} title - Title of window.
         * @param {function} cb - Callback function with result in parameters.
         */
        prompt: function (text, value, title, cb) {
            this.show({
                message: [
                    '<p>' + text + '</p>',
                    '<input type="text" class="form-control bsWindowInput"',
                    ' value="' + value + '" />'
                ].join(''),
                title: (title ? title : 'Prompt'),
                closeable: false,
                buttons: [
                    {
                        label: 'OK',
                        className: 'btn-primary',
                        action: function (instance) {
                            var val = $(instance.element).find('.bsWindowInput:eq(0)').val();
                            instance.close();
                            cb(val);
                        }
                    },
                    {
                        label: 'Cancel',
                        action: function (instance) {
                            instance.close();
                            cb(null);
                        }
                    }
                ]
            });
        } // prompt();
    };
});


$(function () {
    //
    // $('.is-modal').on('click', function () {
    //
    //     var data = $(this).data();
    //
    //     if (data.url) {
    //         $.ajax({
    //             url: data.url,
    //             success: function(result){
    //                 return data.result = result;
    //             }
    //         });
    //     }
    //
    //     app.ModalControl.ModalProcess({title: data.title, body: data.result});
    //
    // });

});



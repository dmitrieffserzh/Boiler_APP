$(function () {
    window.modal  = {
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
                '  <div class="modal-dialog modal-dialog-centered',
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
        alert: function (text, title, cb) {
            this.show({
                message: text,
                title: (title ? title : 'Уведомление!'),
                // buttons: [
                //     {
                //         label: 'OK',
                //         className: 'btn-primary',
                //         action: function (instance) {
                //             instance.close();
                //         }
                //     }
                // ],
                onDisappear: (cb ? cb : function () {
                })
            });
        },
        confirm: function (text, title, cb) {
            this.show({
                message: text,
                title: (title ? title : 'Подтверждение'),
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
                        label: 'Отменить',
                        action: function (instance) {
                            instance.close();
                            cb(false);
                        }
                    }
                ]
            });
        },
        prompt: function (text, value, title, cb) {
            this.show({
                message: [
                    '<p>' + text + '</p>',
                    '<input type="text" class="form-control bsWindowInput"',
                    ' value="' + value + '" />'
                ].join(''),
                title: (title ? title : 'Подсказка'),
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
                        label: 'Отменить',
                        action: function (instance) {
                            instance.close();
                            cb(null);
                        }
                    }
                ]
            });
        },
        ajax: function (text, title) {
            this.show({
                message: text,
                title: title
            });
        }
    };
});
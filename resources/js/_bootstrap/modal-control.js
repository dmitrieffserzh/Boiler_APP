
class ModalControl {

    ModalProcess(parameters){
        this.id         = parameters['id']          || 'modal';
        this.selector   = parameters['selector']    || '';
        this.title      = parameters['title']       || '';
        this.body       = parameters['body']        || '';
        this.footer     = parameters['footer']      || '';
        this.content    = '<div id="' + this.id + '" class="modal fade" >' +
            '<div class="modal-dialog" role="document">' +
            '<div class="modal-content">' +
            '<div class="modal-header">' +
            '<h5 class="modal-title">' + this.title + '</h5>' +
            '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
            '</div>' +
            '<div class="modal-body">' + this.body + '</div>' +
            '<div class="modal-footer">' + this.footer + '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        this.init();
        this.showModal();
    }

    changeTitle(content) {
        $('#' + this.id + ' .modal-title').html(content);
    };

    changeBody(content) {
        $('#' + this.id + ' .modal-body').html(content);
    };

    changeFooter(content) {
        $('#' + this.id + ' .modal-footer').html(content);
    };

    showModal() {
        $('#' + this.id).modal('show');
    };

    hideModal() {
        $('#' + this.id).modal('hide');
    };

    updateModal() {
        $('#' + this.id).modal('handleUpdate');
    };

    init() {
        $('body').prepend(this.content);

        if (this.selector) {
            $(document).on('click', this.selector, $.proxy(this.showModal, this));
        }

        $('#' + this.id).on('hidden.bs.modal', function () {
            $('#' + this.id).remove();
        })
    }
}


export default new ModalControl();
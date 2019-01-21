<form>
    <div class="form-group row">
        <label for="colFormLabel" class="col-sm-2 col-form-label">URL профиля</label>
        <div class="col-sm-6">
            <input type="text" class="form-control ajax" id="colFormLabel" placeholder="{{ $user->route ?? $user->username }}" data-url="{{ route('user.profile.edit.url', $user->route ?? $user->username ) }}">
        </div>
    </div>
</form>

@push('add_scripts')
    <script>

        $('.ajax').on('change', function (event) {
            alert('ff');
            console.log(this.value());
            event.preventDefault();

            // DATA
            var data_url = $(this).data('url');

            $.ajax({
                url: data_url,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'POST',
                success: function (data) {
                    modal_window.find(modal_content).append(data.html);
                },
                complete: function () {
                    modal_window.modal('show');
                }
            });
        });

    </script>
@endpush

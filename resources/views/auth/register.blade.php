@extends('main.app')

@section('content')
    <h1 class="content-title">@lang('auth.register')</h1>
    <div class="content-box">

        <div class="content-box__header content-box__header--dark">
            <ul class="content-box-menu">
                <li><a href="#" class="content-box-menu__link content-box-menu__link--active">Рейтинг</a></li>
                <li><a href="#" class="content-box-menu__link">Новые</a></li>
            </ul>
        </div>


        @if (session('error_message'))
            <div class="alert alert-warning" role="alert">
                {{ session('error_message') }}
            </div>
        @endif


        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group row">
                <label for="name"
                       class="col-md-4 col-form-label text-md-right col-form-label-sm">@lang('auth.register_username')</label>

                <div class="col-md-6">
                    <input id="username" type="text"
                           class="form-control form-control-sm{{ $errors->has('username') ? ' is-invalid' : '' }}"
                           name="username" value="{{ old('username') }}"
                           data-toggle="tooltip" data-placement="right" required autofocus>
                    <span class="valid-feedback" role="alert">Логин свободен!</span>
                    <span class="invalid-feedback" role="alert"></span>
                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">{{ $errors->first('username') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="email"
                       class="col-md-4 col-form-label text-md-right col-form-label-sm">@lang('auth.register_email')</label>

                <div class="col-md-6">
                    <input id="email" type="email"
                           class="form-control form-control-sm{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email"
                           value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password"
                       class="col-md-4 col-form-label text-md-right col-form-label-sm">@lang('auth.register_password')</label>

                <div class="col-md-6">
                    <input id="password" type="password"
                           class="form-control form-control-sm{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm"
                       class="col-md-4 col-form-label text-md-right col-form-label-sm">@lang('auth.register_password_confirmation')</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control form-control-sm"
                           name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="button">
                        @lang('auth.register')
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script>
        let timer = null;

        $('#username').on('keyup', function () {

            let input = $(this);

            clearTimeout(timer);
            timer = setTimeout(function () {

                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: input,
                    type: 'POST',
                    url: '{{ route('check_username') }}',
                    success: function (result) {

                        let mainStat = (result.success) ? 'is-valid' : 'is-invalid';
                        let oldStat = (result.success) ? 'is-invalid' : 'is-valid';
                        let errorMes = result.error.join(' ') || '';

                        if (input.hasClass(oldStat))
                            input.removeClass(oldStat);

                        input.addClass(mainStat);
                        input.parent().find('.invalid-feedback').text(errorMes);
                    }
                });

            }, 500);
        })
    </script>
@endsection

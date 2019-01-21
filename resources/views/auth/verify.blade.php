@extends('main.app')

@section('content')

    <div class="col">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h4">@lang('auth.verify_email')</h1>
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        @lang('auth.verify_refresh')
                    </div>
                @endif

                @lang('auth.verify_check_your_email')
                @lang('auth.verify_not_receive'), <a
                        href="{{ route('verification.resend') }}">@lang('auth.verify_request_repeatedly')</a>.
            </div>
        </div>
    </div>

@endsection

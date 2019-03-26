<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/admin/admin.css') }}" rel="stylesheet">
</head>
<body>
{{-- HEADER --}}
@include('admin.header')

<main class="main">
    @hasSection('sidebar')
        <aside class="main__aside">
            <div class="aside-box"></div>
            <div class="aside-box"></div>
            @yield('sidebar')
        </aside>
    @endif
    <section class="main__section">
        <div class="main__content">
            @yield('content')
        </div>
    </section>
</main>

{{-- FOOTER --}}
@include('admin.footer')

{{-- SCRIPTS --}}
@yield('scripts')
<script>
    $K.init();
</script>
</body>
</html>

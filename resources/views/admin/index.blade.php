@extends('admin.admin')

@section('sidebar')
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('news') }}">
                    Новости
                </a>
            </li>

        <!--   <li class="nav-item">
                        <a class="nav-link" href="{{ route('news') }}">
                            Статьи
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news') }}">
                            События
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news') }}">
                            Компании
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news') }}">
                            Блоги
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news') }}">
                            IT-решения
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('news') }}">
                            Сервисы
                        </a>
                    </li>-->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.list') }}">
                    Пользователи
                </a>
            </li>

            @guest
                <li class="nav-item">
                    <a class="nav-link is-modal-ajax" href="{{ route('login') }}" data-url="{{ route('login') }}" data-title="@lang('auth.login')">@lang('auth.login')</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">@lang('auth.register')</a>
                    </li>
                @endif
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.profile', Auth::user()->route ?? Auth::user()->username) }}">
                        {{ Auth::user()->username }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        @lang('auth.logout')
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
    </div>
@endsection

@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <h3>Новости</h3>
    <hr>
    <table class="is-striped">
        <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Points</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Eve</td>
            <td>Jackson</td>
            <td>94</td>
        </tr>
        <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Eve</td>
            <td>Jackson</td>
            <td>94</td>
        </tr>
        <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Eve</td>
            <td>Jackson</td>
            <td>94</td>
        </tr>
        <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Eve</td>
            <td>Jackson</td>
            <td>94</td>
        </tr>
        <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Eve</td>
            <td>Jackson</td>
            <td>94</td>
        </tr>
        <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Eve</td>
            <td>Jackson</td>
            <td>94</td>
        </tr>
        <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Eve</td>
            <td>Jackson</td>
            <td>94</td>
        </tr>
        <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Eve</td>
            <td>Jackson</td>
            <td>94</td>
        </tr>
        <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Eve</td>
            <td>Jackson</td>
            <td>94</td>
        </tr>
        <tr>
            <td>Jill</td>
            <td>Smith</td>
            <td>50</td>
        </tr>
        <tr>
            <td>Eve</td>
            <td>Jackson</td>
            <td>94</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="2">Total points</td>
            <td>223</td>
        </tr>
        </tfoot>
    </table>



@endsection

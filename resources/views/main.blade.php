@extends('main.app')

@section('content')

    <div class="content-header" style="min-height: 400px; margin: 0 0 2rem">
        <div class="content-header__title">
            <h1 class="content-header__title-text">Новости логистики</h1>
            <a href="#" class="content-header__title-link">Все новости</a>
        </div>
        <ul class="content-header__menu">
            <li class="content-header__menu-item"><a href="#" class="content-header__menu-link content-header__menu-link--active">IT в логистике</a></li>
            <li class="content-header__menu-item"><a href="#" class="content-header__menu-link">Транспортировка</a></li>
            <li class="content-header__menu-item"><a href="#" class="content-header__menu-link">Юридическое сопровождение</a></li>
        </ul>
    </div>

    <div class="content-header" style="min-height: 400px; margin: 0 0 2rem">
        <div class="content-header__title">
            <h1 class="content-header__title-text">Блоги</h1>
            <a href="#" class="content-header__title-link">Все блоги</a>
        </div>
        <ul class="content-header__menu">
            <li class="content-header__menu-item"><a href="#" class="content-header__menu-link content-header__menu-link--active">Рейтинг</a></li>
            <li class="content-header__menu-item"><a href="#" class="content-header__menu-link">Последние</a></li>
        </ul>
    </div>

    <div class="content-header" style="min-height: 400px; margin: 0 0 2rem">
        <div class="content-header__title">
            <h1 class="content-header__title-text">Компании</h1>
            <a href="#" class="content-header__title-link">Все компании</a>
        </div>
        <ul class="content-header__menu">
            <li class="content-header__menu-item"><a href="#" class="content-header__menu-link content-header__menu-link--active">Рейтинг</a></li>
            <li class="content-header__menu-item"><a href="#" class="content-header__menu-link">Последние</a></li>
        </ul>
    </div>


    <div class="content-header" style="min-height: 400px; margin: 0 0 2rem">
        <div class="content-header__title">
            <h1 class="content-header__title-text">Пользователи</h1>
            <a href="#" class="content-header__title-link">Все пользователи</a>
        </div>
        <ul class="content-header__menu">
            <li class="content-header__menu-item"><a href="#" class="content-header__menu-link content-header__menu-link--active">Рейтинг</a></li>
            <li class="content-header__menu-item"><a href="#" class="content-header__menu-link">Последние</a></li>
            <li class="content-header__menu-item"><a href="#" class="content-header__menu-link">В сети</a></li>
        </ul>
    </div>


        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif


@endsection

@section('sidebar')
    SIDEBAR
@endsection
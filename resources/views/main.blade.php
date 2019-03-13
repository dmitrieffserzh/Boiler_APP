@extends('main.app')

@section('content')
    <h1 class="content-title">Новости логистики</h1>
    <div class="content-box" style="min-height: 400px; margin: 0 0 2rem">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif


    </div>
    </div>

    <div class="content-box" style="min-height: 400px; margin: 0 0 2rem">
        <div class="content-box__header">
            <h1 class="content-title">Популярные блоги</h1>
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif


    </div>
    </div>
    <h1 class="content-title">Компании</h1>
    <div class="content-box" style="min-height: 600px; margin: 0 0 2rem">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif


    </div>
    </div>
    <h1 class="content-title">Топ пользователей</h1>
    <div class="content-box" style="min-height: 400px; margin: 0 0 2rem">
        <div class="content-box__header">
            <ul class="content-box-menu">
                <li><a href="#" class="content-box-menu__link content-box-menu__link--active">Рейтинг</a></li>
                <li><a href="#" class="content-box-menu__link">Новые</a></li>
            </ul>
        </div>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif


    </div>
    </div>
@endsection

@section('sidebar')
    SIDEBAR
@endsection
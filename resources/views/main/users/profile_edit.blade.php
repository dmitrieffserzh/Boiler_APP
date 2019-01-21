@extends('main.app')

@section('content')
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h4">Изменить профиль</h1>
                {{ $user->profile->first_name ?? $user->email }} <br>
                {{ $user->route }}
                @include('main.users.forms._route')
            </div>
        </div>
    </div>
@endsection
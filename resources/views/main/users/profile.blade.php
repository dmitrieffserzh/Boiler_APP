@extends('main.app')

@section('content')
    <div class="col">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ UsersHelper::get_avatar($user->profile->avatar) }}" alt="" width="200px">
                @include('main.users.profile_menu')
            </div>
            <div class="col-md-8">
                <strong>{{ '@'.$user->username }}</strong>
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
    SIDEBAR
@endsection
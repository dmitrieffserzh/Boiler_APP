@extends('main.app')

@section('content')
    <div class="col">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ UsersHelper::get_avatar($user->profile->avatar) }}" alt="" width="200px">
                @include('main.users.profile_menu')
            </div>
            <div class="col-md-9">
                <strong>{{ $user->username }}</strong>
            </div>
        </div>
    </div>
@endsection

@section('sidebar')
    SIDEBAR
@endsection
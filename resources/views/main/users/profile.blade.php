@extends('main.app')

@section('content')
    <div class="col row">
        <div class="col-md-3">
            <img src="{{ UsersHelper::get_avatar($user->profile->avatar) }}" alt="" width="200px">
        </div>
        <div class="col-md-9">
            <strong>{{ $user->username }}</strong>
        </div>
    </div>
@endsection

@section('sidebar')
    SIDEBAR
@endsection
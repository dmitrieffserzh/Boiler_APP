@extends('main.app')

@section('content')
    <div class="card-body ">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif


        <div class="col-md-3">
            <img src="{{ UsersHelper::get_avatar($user->profile->avatar) }}" alt="" width="200px">
        </div>
            <div class="col-md-9">
                {{ $user->profile->username }}
            </div>
    </div>
@endsection

@section('sidebar')
    SIDEBAR
@endsection
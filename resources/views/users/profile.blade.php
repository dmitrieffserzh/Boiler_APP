@extends('layouts.app')

@section('content')
    <div class="card-body ">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <h1>Profile</h1>
            <img src="{{ UsersHelper::get_avatar($user) }}" alt="">
    </div>
@endsection

@section('sidebar')
    SIDEBAR
@endsection
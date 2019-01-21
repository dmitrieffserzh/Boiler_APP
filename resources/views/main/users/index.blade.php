@extends('main.app')

@section('content')
    <div class="col-md-12">
        <h1>Пользователи</h1>
        <ul style="list-style: none; padding: 0;margin: 0">
        @foreach($users as $user)
            <li style="margin: 0 0 5px; padding: 0 0 5px 0; border-bottom: 1px Solid #f5f5f8;">
                <img src="{{ UsersHelper::get_avatar($user->profile->avatar) }}" alt="" width="50px" style="border-radius: 50%">

                <a href="{{ route('user.profile', $user->route ?? $user->username) }}">{{ $user->username ?? $user->profile->first_name }}</a></li>
        @endforeach
        </ul>
    </div>
@endsection
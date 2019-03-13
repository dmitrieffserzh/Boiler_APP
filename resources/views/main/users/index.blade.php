@extends('main.app')

@section('content')


    <div class="content-box">
        <div class="content-box__header">
            <h1 class="content-title">Пользователи</h1>
            <ul class="content-box-menu">
                <li><a href="#" class="content-box-menu__link content-box-menu__link--active">Рейтинг</a></li>
                <li><a href="#" class="content-box-menu__link">Новые</a></li>
            </ul>
        </div>
        <ul style="list-style: none; padding: 0;margin: 0">
            @foreach($users as $user)
                <li style="padding: .5rem 1rem; border-bottom: 1px Solid #f5f5f8;">
                    <div class="d-inline-block position-relative" style="display: inline-block; position: relative; margin: 0 .5rem 0 0;">
                        <img src="{{ UsersHelper::get_avatar($user->profile->avatar ?? null) }}" alt="" width="50px"
                             style="border-radius: 50%">
                        @if( $user->is_online() )
                            <span class="component-status component-status--online"></span>
                        @else
                            <span class="component-status component-status--offline"></span>
                        @endif
                    </div>

                    <a class="font-weight-bold text-dark"
                       href="{{ route('user.profile', $user->route ?? $user->username) }}">{{ '@'.$user->username ?? $user->profile->first_name }}</a>
                    @if($user->is_online())
                        <span class="text-muted small lh-125 font-weight-light font-monospace" style="font-size: .85rem;">
                                онлайн
                            </span>
                    @else
                        <span class="text-muted small lh-125 font-weight-light font-monospace" style="font-size: .85rem;">
                                {{ UsersHelper::getOnlineTime($user->profile->gender, $user->profile->offline_at->diffForHumans()) }}
                            </span>
                    @endif
                </li>
            @endforeach
        </ul>
        {{ $users->links('main.pagination.default') }}
        <br>
    </div>
@endsection

@section('sidebar')
    SIDEBAR
@endsection
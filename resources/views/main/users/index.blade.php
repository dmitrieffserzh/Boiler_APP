@extends('main.app')

@section('content')
    <div class="col-md-12">
        <h1 class="h4">Новости</h1>
        <ul style="list-style: none; padding: 0;margin: 0">
            @foreach($users as $user)
                <li style="margin: 0 0 5px; padding: 0 0 5px 0; border-bottom: 1px Solid #f5f5f8;">
                    <img src="{{ UsersHelper::get_avatar($user->profile->avatar ?? null) }}" alt="" width="50px"
                         style="border-radius: 50%">
                    @if( $user->is_online() )
                        <span class="component-status component-status--online"></span>
                    @else
                        <span class="component-status component-status--offline"></span>
                    @endif

                    <a class="font-weight-bold text-dark"
                       href="{{ route('user.profile', $user->route ?? $user->username) }}">{{ '@'.$user->username ?? $user->profile->first_name }}</a>
                    <div>
                        @if($user->is_online())
                            <span class="d-block text-muted small lh-125 font-weight-light font-monospace">
                                онлайн
                            </span>
                        @else
                            <span class="d-block text-muted small lh-125 font-weight-light font-monospace">
                                {{ UsersHelper::getOnlineTime($user->profile->gender, $user->profile->offline_at->diffForHumans()) }}
                            </span>
                        @endif
                    </div>

                </li>
            @endforeach
        </ul>


        {{ $users->links() }}
    </div>
@endsection

@section('sidebar')
    SIDEBAR
@endsection
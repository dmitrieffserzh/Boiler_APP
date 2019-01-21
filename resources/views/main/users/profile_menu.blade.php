@if( Auth::id())
    <ul>
        <li><a href="{{ route( 'user.profile.edit', $user->route ?? $user->route_default ) }}">Изменить профиль</a></li>
    </ul>
@endif
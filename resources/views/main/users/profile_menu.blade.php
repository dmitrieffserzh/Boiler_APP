@if( Auth::id() == $user->id )
    <ul>
        <li><a href="{{ route( 'user.profile.edit', $user->route ?? $user->username ) }}">Изменить профиль</a></li>
    </ul>
@endif
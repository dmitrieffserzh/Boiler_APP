<?php

namespace App\Helpers;

// REGISTER ON config/app.php
class UsersHelper {

    public static function get_avatar($user) {

        if(is_null($user->avatar))
            return '/images/default_avatar.png';

    }
}
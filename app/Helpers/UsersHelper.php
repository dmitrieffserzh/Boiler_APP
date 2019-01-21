<?php

namespace App\Helpers;

// REGISTER ON config/app.php
class UsersHelper {

    public static function get_avatar($avatar) {
        if(is_null($avatar))
            return '/images/default_avatar.png';

        return '/images/' . $avatar;
    }
}
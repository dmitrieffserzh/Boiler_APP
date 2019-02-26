<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail {

    use Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'route',
        'password',
        'remember_token',
        'registration_ip',
        'registration_agent'
    ];

    public function getRouteKeyName() {
        return 'route';
    }



    // RELATIONS
    public function getProvider($provider) {
        return $this->providers->first(function (OAuth $item) use ($provider) {
            return $item->provider === $provider;
        });
    }

    public function oAuth() {
        return $this->hasOne(OAuth::class);
    }

    public function profile() {
        return $this->hasOne(Profile::class);
    }
}

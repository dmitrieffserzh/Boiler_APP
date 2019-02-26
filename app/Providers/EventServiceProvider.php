<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            // add your listeners (aka providers) here
            'SocialiteProviders\\VKontakte\\VKontakteExtendSocialite@handle',
            'SocialiteProviders\\Instagram\\InstagramExtendSocialite@handle',
            '\\JhaoDa\\SocialiteProviders\\Odnoklassniki\\OdnoklassnikiExtendSocialite@handle',
        ],
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];

    public function boot() {
        parent::boot();
            Event::listen(['news.show'] , 'App\Events\ViewPostHandler');
    }
}

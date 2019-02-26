<?php

namespace App\Extensions\SocialProviderExtension;

use App\Extensions\SocialProviderExtension\SocialProviders\VKProvider;
use App\Extensions\SocialProviderExtension\SocialProviders\FBProvider;

class SocialProvider {

    public function mappingRequest($service) {
        $provider = null;
        switch ($service) {
            case 'vkontakte':
                $provider = new VKProvider();
                break;
            case 'facebook':
                $provider = new FBProvider();
                break;
        }
        if (is_null($provider)) abort(403, 'Access denied');
        return $provider->GetSocial();
    }
}
<?php


namespace App\Services\SocialAuth\Facebook;


use App\Enums\SocialNetworks;
use App\Enums\SocialTypeId;
use App\Models\User;
use App\Services\SocialAuth\SocialAuthAbstract;

class Facebook extends SocialAuthAbstract
{

    /**
     * @return string
     */
    public function getSocialNetwork() : string
    {
        return SocialNetworks::FACEBOOK;
    }

    /**
     * @return string
     */
    public function getSocialType() : string
    {
        return SocialTypeId::FACEBOOK;
    }
}

<?php


namespace App\Services\SocialAuth;


use App\Enums\SocialNetworks;
use App\Enums\SocialTypeId;
use App\Models\User;

class Facebook extends SocialAuthAbstract
{
    protected static $socialNetwork = SocialNetworks::FACEBOOK;
    protected static $socialTypeId = SocialTypeId::FACEBOOK;
}

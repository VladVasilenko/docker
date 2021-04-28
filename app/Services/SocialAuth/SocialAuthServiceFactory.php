<?php


namespace App\Services\SocialAuth;


use App\Services\SocialAuth\Facebook\Facebook;

class SocialAuthServiceFactory
{
    /**
     * @param string $class
     */
    public static function make($class)
    {

        $classes = [
            'facebook' => new Facebook()
        ];

        return $classes[$class];
    }

}

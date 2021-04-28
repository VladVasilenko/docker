<?php

namespace App\Http\Controllers\AuthSocial;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialRequest;
use App\Services\SocialAuth\Facebook;
use App\Services\SocialAuth\SocailAuthServiceFactory;
use App\Services\SocialAuth\SocialAuthAbstract;
use App\Services\SocialAuth\SocialAuthServiceFactory;

class SocialController extends Controller
{
    /* @var SocialAuthAbstract */
    protected $socialAuthService;


    public function __construct(SocialRequest $request)
    {
        $this->socialAuthService = SocialAuthServiceFactory::make($request->socialNetwork);
    }

    public function redirect()
    {
        return $this->socialAuthService->redirectForAuth();
    }

    public function loginWith()
    {
        return $this->socialAuthService->login();
    }
}

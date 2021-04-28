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

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect(): \Symfony\Component\HttpFoundation\RedirectResponse
    {
        return $this->socialAuthService->redirectForAuth();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function loginWith()
    {
        return $this->socialAuthService->login();
    }
}

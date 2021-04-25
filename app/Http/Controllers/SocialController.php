<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialRequest;
use App\Services\SocialAuth\Facebook;
use App\Services\SocialAuth\SocialAuthAbstract;

class SocialController extends Controller
{
    /* @var SocialAuthAbstract */
    protected $class;

    protected $classes = [
        'facebook' => Facebook::class
    ];

    public function __construct(SocialRequest $request)
    {
        $this->class = $this->classes[$request->socialNetwork];
    }

    public function redirect()
    {
        return $this->class::redirectForAuth();
    }

    public function loginWith()
    {
        $this->class::login();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialRequest;
use App\Services\SocialAuth\Facebook;
use App\Services\SocialAuth\SocialAuthAbstract;
use Illuminate\Http\Request;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;

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

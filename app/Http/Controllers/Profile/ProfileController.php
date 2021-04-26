<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Profile\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class ProfileController extends Controller
{

    public function index() {

      return view('profile.profile', ['info' => UserProfile::info()]);
    }

    public function setBonus() {

        return view('profile.profile',[
            'bonus' => UserProfile::setBonus(),
            'info' => UserProfile::info()
        ]);

    }
}

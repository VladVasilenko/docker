<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Profile\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class ProfileController extends Controller
{

    public $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function index()
    {

      return view('profile.profile', ['info' => $this->service->info()]);
    }

    public function setBonus()
    {
        $this->service->setBonus();
        return $this->index();
    }
}

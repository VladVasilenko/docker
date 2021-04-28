<?php


namespace App\Services\SocialAuth;


use App\Enums\SocialNetworks;
use App\Enums\SocialTypeId;
use App\Models\User;
use App\Models\UserSocial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Exception;


abstract class SocialAuthAbstract
{
    abstract public function getSocialNetwork() : string ;

    abstract public function getSocialType () : string;

    public function login()
    {
        try {
            $socialUser = Socialite::driver($this->getSocialNetwork())->user();
            session(['user_token' => $socialUser->token]);
        } catch (\Exception $e) {
            return redirect('/login');
        }

        $user = UserSocial::query()->with('user')->firstWhere('social_id', $socialUser->id);

        if($user){
            $user = $user->user;
        }else {
            $user = User::create();
            $user->socials()->create([
                'social_id' => $socialUser->id,
                'social_type' => $this->getSocialType(),
            ]);
        }

        Auth::login($user);
        return redirect()->route('user.index');

    }

    public function redirectForAuth()
    {
        return Socialite::driver($this->getSocialNetwork())->redirect();
    }

}

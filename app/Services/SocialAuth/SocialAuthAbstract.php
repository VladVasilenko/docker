<?php


namespace App\Services\SocialAuth;


use App\Models\User;
use App\Models\UserSocial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Exception;


abstract class SocialAuthAbstract
{
    protected static $socialNetwork;

    protected static $socialTypeId;

    public static function login()
    {
        try {
            $socialUser = Socialite::driver(static::$socialNetwork)->user();
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
                'social_type' => static::$socialTypeId,
            ]);
        }

        Auth::login($user);
        return redirect()->route('user.index');

    }

    public static function redirectForAuth()
    {
        return Socialite::driver(static::$socialNetwork)->redirect();
    }

}

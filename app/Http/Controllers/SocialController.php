<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginWithFacebook()
    {
        try {

            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('social_id', $user->id)->first();

            if($isUser){
                Auth::login($isUser);
                return redirect('/');
            }else{
                $createUser = User::create([
                    'social_id' => $user->id,
                    'social_type' => User::FACEBOOK
                ]);

                Auth::login($createUser);
                return redirect('/');
            }

        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }
}

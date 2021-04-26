<?php


namespace App\Services\Profile;

use App\Models\Bonus;
use App\Services\Bonus\UserBonusService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use phpDocumentor\Reflection\Types\Mixed_;

class UserProfile
{
    /**
     * @return object
     */
    public static function info() : object
    {
        $information = new \StdClass();
        $user_token = \session('user_token');
        $user = Socialite::driver('facebook')->userFromToken($user_token);
        $information->userName = $user->getName();
        $information->userEmail = $user->getEmail();
        $information->userPhoto = $user->getAvatar() . "&access_token=$user->token";
        $information->hasBonus = self::hasBonus();

        return $information;

    }

    /**
     * @return mixed
     */
    public static function hasBonus()
    {
        $hasBonus = Bonus::whereHas('user', function ($query) {
            return $query->where('user_id', Auth::user()->id);
        })->first();
        if ($hasBonus) {
            $bonus = new UserBonusService($hasBonus);
            return $bonus->bonusName;
        } else {
            return false;
        }
    }

    public static function setBonus()
    {
        /** @var Bonus $bonus */
        $bonus = Bonus::query()->where('available_count','!=',0)->inRandomOrder()->first();
        if ($bonus) {
            $bonusService = new UserBonusService($bonus);
            if (!static::hasBonus()) {
                $bonusService->setBonus();
            }
        }
    }





}

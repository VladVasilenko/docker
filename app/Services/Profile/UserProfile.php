<?php


namespace App\Services\Profile;


use App\Models\Bonus;
use App\Models\UsersBonuses;
use App\Services\Bonus\UserBonusService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

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
        $information->hasBonus = static::hasBonus();

        return $information;

    }

    /**
     * @return bool
     */
    public static function hasBonus() : bool
    {
        $hasBonus = UsersBonuses::query()->where('user_id',Auth::user()->id)->first();
        if ($hasBonus) {
            return true;
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
                return $bonusService->getName();
            } else {
                return $bonusService->getName();
            }
        }

    }





}

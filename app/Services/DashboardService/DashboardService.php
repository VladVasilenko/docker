<?php


namespace App\Services\DashboardService;


use App\Models\Bonus;
use App\Models\User;
use App\Services\Bonus\UserBonusService;

class DashboardService
{
    /**
     * @return object
     */
    public static function info() : object
    {
        $users = User::where('is_admin',false)->with('bonus')->get();

        return  $users->map(function ($user) {
            return collect($user)
                ->put('bonusName',((new UserBonusService($user->bonus[0]))->bonusName))
                ->only('id','register_at','bonusName')
                ->all();
        });

    }

}

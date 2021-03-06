<?php


namespace App\Services\Dashboard;


use App\Models\Bonus;
use App\Models\User;
use App\Services\Bonus\AbstractBonus;
use App\Services\Bonus\UserBonus;
use App\Services\Bonus\UserBonusService;

class DashboardService
{
    /** @var UserBonusService  */
    public $bonusService;

    public function __construct()
    {
        $this->bonusService = new UserBonusService();
    }

    /**
     * @return object
     */
    public  function info() : object
    {
        $users = User::where('is_admin',false)->with('bonus')->get();

        return  $users->map(function ($user) {
            return collect($user)
                ->put('bonusName', $this->bonusService->getName($user))
                ->only('id','register_at','bonusName')
                ->all();
        });

    }

}

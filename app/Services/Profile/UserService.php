<?php


namespace App\Services\Profile;

use App\Models\Bonus;
use App\Services\Bonus\UserBonus;
use App\Services\Bonus\UserBonusService;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;
use phpDocumentor\Reflection\Types\Mixed_;

class UserService
{
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
        $information = new \StdClass();
        $user_token = \session('user_token');
        $user = Socialite::driver('facebook')->userFromToken($user_token);
        $information->userName = $user->getName();
        $information->userEmail = $user->getEmail();
        $information->userPhoto = $user->getAvatar() . "&access_token=$user->token";
        $information->hasBonus = $this->bonusService->hasBonus(Auth::user());
        $information->bonusName = $information->hasBonus ?
            $this->bonusService->getName(Auth::user()) :
            'Бонус еще не получен';
        return $information;

    }

    public function getBonus() : void
    {
        $user = Auth::user();
        if (!$this->bonusService->hasBonus($user)) {
            $bonus = $this->bonusService::getRandBonus();
            $this->bonusService->apply($user,$bonus);
        }
    }





}

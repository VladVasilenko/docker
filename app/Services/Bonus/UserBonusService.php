<?php


namespace App\Services\Bonus;


use App\Interfaces\Bonus\AbstractBonus;
use App\Models\Bonus;
use App\Models\User;
use App\Models\UsersBonuses;
use Illuminate\Support\Facades\Auth;

class UserBonusService extends AbstractBonus
{
    public function __construct(Bonus $bonus)
    {
        parent::__construct($bonus);
    }


    public function setBonus()
    {
        UsersBonuses::query()->create([
            'user_id' => Auth::user()->id,
            'bonus_id' => $this->bonus->id
            ]);
        if (self::isLimited())
        {
            $this->decrementCount();

        }

    }
}

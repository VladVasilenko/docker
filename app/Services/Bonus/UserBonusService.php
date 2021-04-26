<?php


namespace App\Services\Bonus;


use App\Services\Bonus\AbstractBonus;
use App\Models\Bonus;
use Illuminate\Support\Facades\Auth;


class UserBonusService extends AbstractBonus
{

    /**
     * UserBonusService constructor.
     * @param Bonus $bonus
     */
    public function __construct(Bonus $bonus)
    {
        parent::__construct($bonus);
    }

    /**
     * @return void
     */
    public function setBonus() : void
    {
        $this->bonus->user()->sync([Auth::user()->id]);
        if (self::isLimited())
        {
            $this->decrementCount();
        }
    }
}

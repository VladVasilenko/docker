<?php


namespace App\Interfaces\Bonus;

use App\Models\Bonus;
use App\Models\User;

interface BonusInterface
{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @return mixed
     */
    public function setBonus();

    /**
     * @return mixed
     */
    public function isLimited();

    /**
     * @return int
     */
    public function getAvailableCount() : int;

    /**
     * @return Bonus
     */
    public static function getBonus() : Bonus ;

    /**
     * @return mixed
     */
    public  function decrementCount();

}

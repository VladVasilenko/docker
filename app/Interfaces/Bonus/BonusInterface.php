<?php


namespace App\Interfaces\Bonus;

use App\Models\Bonus;
use App\Models\User;

interface BonusInterface
{
    public function getName();
    public function setBonus();
    public function isLimited();
    public function getAvailableCount();
    public static function getBonus();
    public  function decrementCount();

}

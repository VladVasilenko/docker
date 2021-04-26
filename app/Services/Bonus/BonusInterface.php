<?php


namespace App\Services\Bonus;

use App\Models\Bonus;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

interface BonusInterface
{
    /**
     * @return string
     */
    public function getName() : string;

    /**
     * @return mixed
     */
    public function setBonus() : void;

    /**
     * @return bool
     */
    public function isLimited() : bool;

    /**
     * @return int
     */
    public function getAvailableCount() : int;

    /**
     * @return Model
     */
    public  function getBonus() : Model ;

    /**
     *
     */
    public  function decrementCount() : void;

    /**
     * @return Model
     */
    public function getDefaultModel() : Model;

}

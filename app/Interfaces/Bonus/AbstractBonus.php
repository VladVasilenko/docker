<?php


namespace App\Interfaces\Bonus;


use App\Models\Bonus;
use App\Models\User;

abstract class AbstractBonus implements BonusInterface
{
    /** @var string */
    protected $bonusName;
    /** @var int */
    protected $availableCount;
    /** @var Bonus */
    protected $bonus;

    protected function __construct(Bonus $bonus)
    {
        $this->bonus = $bonus;
        $this->bonusName = __('bonuses.names.'.$bonus->id);
        $this->availableCount = $bonus->available_count;
    }

    /**
     * @return string
     */
    public function getName() : string {
        return $this->bonusName;
    }

    abstract public function setBonus();

    /**
     * @return bool
     */
    public function isLimited() : bool
    {
        if ($this->bonus->is_limited) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return int
     */
    public function getAvailableCount() : int
    {
        return $this->availableCount;
    }

    /**
     * @return Bonus
     */
    public static function getBonus() : Bonus
    {
        return Bonus::query()->where('available_count','!=','0')->inRandomOrder()->first();

    }

    /**
     * @return mixed|void
     */
    public  function decrementCount() : void
    {
        $this->bonus->decrement('available_count');
    }


}

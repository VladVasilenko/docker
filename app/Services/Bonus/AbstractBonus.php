<?php


namespace App\Services\Bonus;


use App\Models\Bonus;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractBonus implements BonusInterface
{
    /** @var string */
    public $bonusName;
    /** @var int */
    protected $availableCount;
    /** @var Model */
    protected $bonus;

    protected function __construct(Model $bonus = null)
    {
        $this->bonus = $bonus ? $bonus :  self::getDefaultModel();
        $this->bonusName = __('bonuses.names.'.$bonus->id);
        $this->availableCount = $bonus->available_count;
    }

    /**
     * @return string
     */
    public function getName() : string {
        return $this->bonusName;
    }

    abstract public function setBonus() : void;

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
    public  function getBonus() : Model
    {
        return $this->bonus->query()->where('available_count','!=',0)->inRandomOrder()->first();
    }

    /**
     * @return mixed|void
     */
    public  function decrementCount() : void
    {
        $this->bonus->decrement('available_count');
    }

    /**
     * @return Model
     */
    public function getDefaultModel() : Model
    {
        return Bonus::query()->where('available_count','!=',0)->inRandomOrder()->first();
    }

}

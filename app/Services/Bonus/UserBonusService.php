<?php


namespace App\Services\Bonus;


use App\Models\Bonus;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class UserBonusService
{

    /**
     * @param User $user
     * @return string
     */
    public function getName(User $user): string
    {
        $bonusId = $user->bonus()->first()->id;
        return __('bonuses.names.' . $bonusId);
    }

    /**
     * @param User $user
     * @param Bonus $bonus
     * @throws \Exception
     */
    public function apply(User $user,Bonus $bonus) : void
    {
        if (!$this->hasBonus($user)) {
            $user->bonus()->attach($bonus->id);
            $bonus->decrementCount();
        } else {
            throw new \Exception('У данного пользователя уже есть бонус');
        }

    }

    /**
     * @param User $user
     * @return bool
     */

    public function hasBonus(User $user) : bool
    {
        return $user->bonus()->exists();
    }

    /**
     * @param Bonus $bonus
     * @return int
     */
    public function getAvailableCount(Bonus $bonus): int
    {
        return (int)$bonus->available_count;
    }

    /**
     * @return Bonus|\Illuminate\Database\Eloquent\Builder|Model|object
     * @throws \Exception
     */
    public function getRandBonus()
    {
        $bonus = Bonus::query()->where('available_count', '!=', 0)
            ->orWhere('available_count','=',null)
            ->inRandomOrder()->first();
        if (!is_null($bonus)) {
            return $bonus;
        } else {
            throw new \Exception('Доступного бонуса нет');
        }
    }

}

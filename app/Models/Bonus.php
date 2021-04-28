<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Bonus extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * @return BelongsToMany
     */
    public function user() : BelongsToMany
    {
        return $this->belongsToMany(User::class,'users_bonuses','bonus_id','user_id');
    }

    /**
     * @return bool
     */
    public function isLimited(): bool
    {
        return (bool)($this->is_limited ?? false);
    }


    public function decrementCount(): void
    {
        if ($this->isLimited()) {
            $this->decrement('available_count');
        }
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Bonus extends Model
{
    use HasFactory;

    /**
     * @var boolean
     */
    private $is_limited;

    public $timestamps = false;

    /**
     * @return BelongsToMany
     */
    public function user() : BelongsToMany
    {
        return $this->belongsToMany(User::class,'users_bonuses','bonus_id','user_id');
    }


}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public const CREATED_AT = 'register_at';
    public const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'social_id',
        'social_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'register_at' => 'datetime',
    ];

    /**
     * @return HasMany
     */
    public function socials() : HasMany {

        return $this->hasMany(UserSocial::class,'user_id','id');
    }

    /**
     * @return BelongsToMany
     */
    public function bonus() : BelongsToMany {

        return $this->belongsToMany(Bonus::class,'users_bonuses');
    }
}

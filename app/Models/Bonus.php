<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bonus extends Model
{
    use HasFactory;

    /**
     * @var boolean
     */
    private $is_limited;

    public $timestamps = false;


}

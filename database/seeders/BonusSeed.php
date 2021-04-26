<?php

namespace Database\Seeders;

use App\Models\Bonus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

class BonusSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['available_count'=> rand(0, 20), 'is_limited'=> true],
            ['available_count'=>null, 'is_limited'=> false],
            ['available_count'=>rand(0, 20), 'is_limited'=> true],

        ];

        Bonus::insert($data);
    }
}

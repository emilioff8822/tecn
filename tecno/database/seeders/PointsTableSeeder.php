<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PointsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,50) as $index) {
            DB::table('points')->insert([
                'nome' => $faker->company,
                'indirizzo' => $faker->address,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
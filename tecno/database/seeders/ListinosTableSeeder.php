<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ListinosTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,50) as $index) {
            DB::table('listinos')->insert([
                'id_servizio' => $faker->numberBetween(1, 50),
                'id_point' => $faker->numberBetween(1, 50),
                'costo' => $faker->randomFloat(2, 10, 200),
                'prezzo_vendita' => $faker->randomFloat(2, 10, 200),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
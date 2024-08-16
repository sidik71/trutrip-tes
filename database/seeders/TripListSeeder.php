<?php

namespace Database\Seeders;

use App\Models\Trip\TripList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TripListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for($i=0; $i < 10; $i++){
            TripList::create([
                'user_id' => mt_rand(1,10),
                'title' => $faker->sentence(mt_rand(2,8)),
                'origin' => $faker->city,
                'destination' => $faker->city,
                'start_date' => $faker->date,
                'end_date' => $faker->date,
                'status' => 'single day',
                'description' => $faker->sentence
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Kritik;
use Faker\Factory as Faker;

class KritikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Kritik::create(1000)->create();

        $faker = Faker::create('id_ID');
        for($loop = 1; $loop <= 1000; $loop++)
        {
            Kritik::create([
                'comment'   => $faker->text($maxNbChars = 200),
                'rating'    => $faker->numberBetween(1,5),
                'film_id'   => $faker->numberBetween(1,128),
                'user_id'   => $faker->numberBetween(1,10),
            ]);
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\VideoCategorie;

class VideoCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $i) {
        	VideoCategorie::create([
				'title' => $faker->words(1, true),
				'featured' => '0'
        	]);
        }
    }
}

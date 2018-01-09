<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\FileCategorie;

class FileCategoriesTableSeeder extends Seeder
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
        	FileCategorie::create([
				'title' => $faker->words(1, true)
        	]);
        }
    }
}

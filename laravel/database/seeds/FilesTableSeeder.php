<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\File;
use App\School;
use App\FileCategorie;

class FilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $school 	= School::orderByRaw('RANDOM()')->first();
        $category 	= FileCategorie::orderByRaw('RANDOM()')->first();

        foreach (range(1, 50) as $i) {
        	File::create([
        		'title' => $faker->uuid(),
				'file' => $faker->imageUrl(640, 480),
				'type' => '0',
				'school_id' => $school->id,
				'category_id' => $category->id
        	]);
        }

        foreach (range(1, 50) as $i) {
        	File::create([
        		'title' => $faker->uuid(),
				'file' => $faker->imageUrl(640, 480),
				'type' => '1',
				'school_id' => $school->id,
				'category_id' => $category->id
        	]);
        }
    }
}

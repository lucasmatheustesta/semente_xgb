<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Classe;
use App\Year;
use App\School;

class ClassesTableSeeder extends Seeder
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

        	$year = Year::orderByRaw('RAND()')->first();
        	$school = School::orderByRaw('RAND()')->first();

        	Classe::create([
        		'name' => $faker->words(3, true),
				'number' => $faker->randomNumber(2,false),
				'year_id' => $year->id,
				'school_id' => $school->id
        	]);
        }

    }
}

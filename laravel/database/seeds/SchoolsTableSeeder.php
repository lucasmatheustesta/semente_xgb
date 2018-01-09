<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\School;
use App\City;

class SchoolsTableSeeder extends Seeder
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
        	//$city = City::where('state_id', 35)->orderByRaw('RANDOM()')->first();
        	School::create([
				'name' => $faker->words(3, true),
				'email' => $faker->unique()->email(),
				'address' => $faker->streetAddress(),
				'phone' => $faker->e164PhoneNumber(),
				'validity' => $faker->date('Y-m-d'),
				// 'logotype' => $faker->imageUrl(300,300),
				'contact' => $faker->name('male'),
				'student_code' => $faker->unique()->uuid() ,
				'teacher_code' => $faker->unique()->uuid() ,
				'state_id' => 11,
				'citie_id' => 1100023,
				'district' => $faker->words(2, true),
				'complement' => $faker->words(1, true)
        	]);
        }
    }
}

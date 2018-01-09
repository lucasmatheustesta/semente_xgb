<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Notice;

class NoticesTableSeeder extends Seeder
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
        	Notice::create([
				'title' => $faker->words(4, true),
				'subtitle' => $faker->sentence(),
				'notice' => $faker->paragraphs(3, true)
        	]);
        }
    }
}

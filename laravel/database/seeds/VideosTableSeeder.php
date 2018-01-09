<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Video;
use App\Year;
use App\VideoCategorie;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker 		= Faker::create();
        $category 	= VideoCategorie::orderByRaw('RAND()')->first();
        $year 		= Year::orderByRaw('RAND()')->first();

        $videos = array(
        	'https://vimeo.com/231352560',
        	'https://vimeo.com/174190102',
        	'https://vimeo.com/153952194',
        	'https://vimeo.com/229399968',
        	'https://vimeo.com/173120760',
        	'https://vimeo.com/174158118',
        	'https://vimeo.com/153011731',
        	'https://vimeo.com/176329517',
        	'https://vimeo.com/176337266',
        	'https://vimeo.com/120872516',
        	'https://vimeo.com/176952646',
        	'https://vimeo.com/229854054',
        	'https://vimeo.com/230046783',
        	'https://vimeo.com/172321141',
        	'https://vimeo.com/229856130',
        	'https://vimeo.com/96505122',
        	'https://vimeo.com/166831913',
        	'https://vimeo.com/228724581',
        	'https://vimeo.com/225915308',
        	'https://vimeo.com/228977554',
        	'https://vimeo.com/168139667',
        	'https://vimeo.com/182972204',
        	'https://vimeo.com/183752285',
        	'https://vimeo.com/227962431',
        	'https://vimeo.com/184497404',
        	'https://vimeo.com/184245517',
        	'https://vimeo.com/227657050',
        	'https://vimeo.com/227690432',
        	'https://vimeo.com/223753663',
        	'https://vimeo.com/213289268',
        	'https://vimeo.com/227201297',
        	'https://vimeo.com/63339292',
        	'https://vimeo.com/226991192',
        	'https://vimeo.com/206295140',
        	'https://vimeo.com/225956849',
        	'https://vimeo.com/224030237',
        	'https://vimeo.com/225479756',
        	'https://vimeo.com/218528943',
        	'https://vimeo.com/177026461',
        );


        foreach (range(1, 50) as $i) {
        	Video::create([
				'title' => $faker->words(3, true),
				'url' =>  $videos[array_rand($videos)],
				'type' => 'A',
				'year_id' => $year->id,
				'category_id' => $category->id ,
        	]);
        }

        foreach (range(1, 50) as $i) {
        	Video::create([
				'title' => $faker->words(3, true),
				'url' =>  $videos[array_rand($videos)],
				'type' => 'P',
				'year_id' => $year->id,
				'category_id' => $category->id ,
        	]);
        }
    }
}

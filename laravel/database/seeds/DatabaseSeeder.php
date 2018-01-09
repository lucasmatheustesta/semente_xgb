<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatesTableSeeder::class);
//        $this->call(CitiesTableSeeder::class);
        $this->call(YearsTableSeeder::class);
        $this->call(SchoolsTableSeeder::class);
        $this->call(ClassesTableSeeder::class);
        $this->call(NoticesTableSeeder::class);
        $this->call(VideoCategoriesTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(FileCategoriesTableSeeder::class);
        $this->call(FilesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}

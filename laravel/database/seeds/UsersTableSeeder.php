<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1)->states('admin')->create([
        	'name' => 'Administrador',
        	'email' => 'admin@programasemente.com.br'
        ]);

        factory(App\User::class, 1)->create([
        	'name' => 'Cliente da Siva',
        	'email' => 'user@programasemente.com.br'
        ]);
    }
}

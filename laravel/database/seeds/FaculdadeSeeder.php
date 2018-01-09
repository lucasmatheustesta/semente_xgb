<?php

use Illuminate\Database\Seeder;

class ClinicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
                'nome'      => "Marcos",
                'logotipo'     => "admin",
                'telefone'  => 'admin',
                'site'  => 'admin',
                'email'  => 'admin',
                'endereco'  => 'admin',
                'bairro'  => 'admin',
                'cidade'  => 'admin',
                'estado'  => 'admin',
            ], 
            
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuarioSeeder extends Seeder
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
                'name'      => "Febrasgo",
                'email'     => "contato@febrasgo.org.br",
                'password'  => bcrypt('123456'),
            ], 
            [
                'name'      => "Status Odontologia",
                'email'     => "clinica@marcosferrarez.com.br",
                'password'  => bcrypt('123456'),
            ],
            [
                'name'      => "Tiago Rodrigues",
                'email'     => "consultor@marcosferrarez.com.br",
                'password'  => bcrypt('123456'),
            ]
        ]);

        DB::table("roles")->insert([
            [
                'name'      => "admin",
                'label'     => "Admin",
            ], 
            [
                'name'      => "clinica",
                'label'     => "Clínica",
            ],
            [
                'name'      => "consultor",
                'label'     => "Consultor",
            ]
        ]);

        DB::table("roles")->insert([
            [
                'name'      => "admin",
                'label'     => "Admin",
            ], 
            [
                'name'      => "clinica",
                'label'     => "Clínica",
            ],
            [
                'name'      => "consultor",
                'label'     => "Consultor",
            ]
        ]);

        DB::table("permissions")->insert([
            [
                'name'      => "view_clinica",
                'label'     => "Ver Clínica",
            ],
            [
                'name'      => "add_clinica",
                'label'     => "Adicionar Clínica",
            ], 
            [
                'name'      => "edit_clinica",
                'label'     => "Editar Clínica",
            ],
            [
                'name'      => "delete_clinica",
                'label'     => "Deletar Clínica",
            ],
            [
                'name'      => "view_consultor",
                'label'     => "Ver Consultor",
            ], 
            [
                'name'      => "add_consultor",
                'label'     => "Adicionar Consultor",
            ],
            [
                'name'      => "edit_consultor",
                'label'     => "Editar Consultor",
            ],
            [
                'name'      => "delete_consultor",
                'label'     => "Deletar Consultor",
            ],
            [
                'name'      => "view_paciente",
                'label'     => "Ver Paciente",
            ],
            [
                'name'      => "add_paciente",
                'label'     => "Adicionar Paciente",
            ],
            [
                'name'      => "edit_paciente",
                'label'     => "Editar Paciente",
            ],
            [
                'name'      => "delete_paciente",
                'label'     => "Deletar Paciente",
            ],
            [
                'name'      => "view_servico",
                'label'     => "Ver Serviço",
            ],
            [
                'name'      => "add_servico",
                'label'     => "Adicionar Serviço",
            ],
            [
                'name'      => "edit_servico",
                'label'     => "Editar Serviço",
            ],
            [
                'name'      => "delete_servico",
                'label'     => "Deletar Serviço",
            ]
        ]);
    }
}

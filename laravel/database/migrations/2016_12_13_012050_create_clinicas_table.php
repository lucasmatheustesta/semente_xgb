<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinicas', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('responsavel');
            $table->enum('type', ['fisico', 'juridico'])->default('fisico');
            $table->string('cpf_cnpj');
            $table->string('phone')->nullable();
            $table->string('site')->nullable();
            $table->enum('contract', ['accept', 'reject'])->default('reject');
            $table->string('address')->nullable();

            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('states')->onDelete('no action');

            $table->integer('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')->on('cities')->onDelete('no action');

            $table->string('bairro')->nullable(); 

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('clinica_consultor', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('clinica_id')->unsigned();
            $table->foreign('clinica_id')->references('id')->on('clinicas')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('consultor_id')->unsigned();
            $table->foreign('consultor_id')->references('id')->on('consultors')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clinicas');
        Schema::dropIfExists('clinica_consultor');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('cpf')->nullable();
            $table->string('foto')->nullable();
            $table->string('birthday')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
           
            $table->string('address')->nullable();

            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('states')->onDelete('no action');

            $table->integer('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')->on('cities')->onDelete('no action');

            $table->string('bairro')->nullable(); 

            $table->integer('clinica_id')->unsigned();
            $table->foreign('clinica_id')->references('id')->on('clinicas')->onDelete('cascade');

            $table->integer('consultor_id')->unsigned();
            $table->foreign('consultor_id')->references('id')->on('consultors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}

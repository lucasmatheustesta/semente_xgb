<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cpf')->nullable();
            $table->string('birthday')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultors');
    }
}

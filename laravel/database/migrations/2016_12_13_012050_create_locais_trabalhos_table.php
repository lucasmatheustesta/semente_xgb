<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocaisTrabalhosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locais_trabalhos', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('titulo', 100);

            $table->integer('tipo')->unsigned();
            $table->foreign('tipo')->references('id')->on('tipos_locais_trabalhos')->onDelete('no action');

            $table->string('fone1', 14)->nullable();
            $table->string('fone2', 14)->nullable();
            $table->string('website', 100)->nullable();

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
        Schema::dropIfExists('locais_trabalhos');
    }
}

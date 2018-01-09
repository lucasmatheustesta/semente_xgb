<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaculdadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculdades', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->string('titulo', 100);
            $table->enum('tipo', ['0', '1'])->default('0');
            $table->string('fone', 14)->nullable();
            $table->string('fax', 14)->nullable();
            $table->string('website', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('pontos', 8)->nullable();

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
        Schema::dropIfExists('faculdades');
    }
}

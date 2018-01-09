<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchools extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 100);
            $table->string('email')->unique();
            $table->string('address', 250);
            $table->string('phone', 14);
            $table->date('validity');
            $table->string('image', 250)->nullable();
            $table->string('contact', 250)->nullable();
            $table->string('student_code')->unique();
            $table->string('teacher_code')->unique();
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')->references('id')->on('states')->onDelete('no action');
            $table->integer('citie_id')->unsigned();
            $table->foreign('citie_id')->references('id')->on('cities')->onDelete('no action');
            $table->string('district', 50);
            $table->string('complement', 100);
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
        Schema::drop('schools');
    }
}

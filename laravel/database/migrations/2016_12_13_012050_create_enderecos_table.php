<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');

            $table->string('cep', 9);

            $table->integer('tipo_logradouro')->unsigned();
            $table->foreign('tipo_logradouro')->references('id')->on('tipos_logradouros')->onDelete('no action');

            $table->integer('tipo_endereco')->unsigned();
            $table->foreign('tipo_endereco')->references('id')->on('tipos_enderecos')->onDelete('no action');

            $table->string('endereco', 100);
            $table->string('numero', 8)->nullable();
            $table->string('complemento', 50)->nullable();
            $table->string('bairro', 50)->nullable();

            $table->integer('pais_id')->unsigned();
            $table->foreign('pais_id')->references('id')->on('paises')->onDelete('no action');

            $table->string('localidade', 100)->nullable();

            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('estados')->onDelete('no action')->nullable();

            $table->integer('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')->on('cidades')->onDelete('no action')->nullable();

            $table->enum('endereco_correspondencia', ['0', '1'])->default('0');
            $table->enum('endereco_atualizado', ['0', '1'])->default('0');

            $table->timestamps();
        });

        Schema::create('endereco_facudade', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('faculdade_id')->unsigned();
            $table->foreign('faculdade_id')->references('id')->on('faculdades')->onDelete('cascade');
        });

        Schema::create('endereco_local_trabalho', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('local_trabalho_id')->unsigned();
            $table->foreign('local_trabalho_id')->references('id')->on('locais_trabalhos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos');
    }
}

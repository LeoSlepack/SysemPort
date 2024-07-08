<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('tipVisita');
            $table->string('responsavel');
            $table->string('autorizado');
            $table->string('status')->default('aberto');
            $table->timestamp('hora_encerramento')->nullable();
            $table->unsignedBigInteger('dado_id');
            $table->foreign('dado_id')->references('id')->on('portarias')->onDelete('cascade');
            $table->string('nome_pessoa'); // Adicionando o campo nome_pessoa
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
        Schema::dropIfExists('visits');
    }
}

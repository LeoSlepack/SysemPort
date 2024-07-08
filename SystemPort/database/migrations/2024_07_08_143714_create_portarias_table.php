<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portarias', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('empresa');
            $table->string('cnpj');
            $table->string('cpf');
            $table->string('transportadora');
            $table->string('veiculo');
            $table->string('placa');
            $table->string('motorista');
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
        Schema::dropIfExists('portarias');
    }
}


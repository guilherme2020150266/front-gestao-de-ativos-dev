<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Manutencoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manutencoes', function (Blueprint $table) {
            $table->id();
            $table->string('tecnico');
            $table->foreignId('usuario_id')->constrained('users');
            $table->foreignId('funcionario_id')->constrained('funcionarios');
            $table->foreignId('equipamento_id')->constrained('equipamentos');
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
        Schema::dropIfExists('manutencoes');
    }
}

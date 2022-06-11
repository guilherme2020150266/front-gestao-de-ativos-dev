<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Movimentacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->id();
            $table->string('telefone')->nullable();
            $table->foreignId('funcionarios_id')->constrained('funcionarios');
            $table->foreignId('users_id')->constrained('users');
            $table->boolean('termo_responsabilidade')->default(0)->nullable();
            $table->foreignId('equipamento_id')->constrained('equipamentos');
            $table->boolean('tipo_movimentacao');
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
        Schema::dropIfExists('movimentacoes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Funcionarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('telefone')->nullable();
            $table->string('email')->nullable();
            $table->string('nome');
            $table->string('cargo')->nullable();
            $table->string('matricula', 64)->unique()->nullable();
            $table->string('cpf', 11)->nullable();
            $table->string('rg', 10)->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('funcionarios');
    }
}

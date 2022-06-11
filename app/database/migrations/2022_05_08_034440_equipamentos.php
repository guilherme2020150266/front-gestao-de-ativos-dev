<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Equipamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_equipamento_id')->constrained('tipo_equipamentos');
            $table->string('modelo')->nullable();
            $table->string('fabricante')->nullable();
            $table->string('numero_serie')->nullable();
            $table->string('status')->default('disponivel');
            $table->string('numero_patrimonio');
            $table->string('cpu')->nullable();
            $table->string('memoria_ram')->nullable();
            $table->string('valor')->nullable();
            $table->string('valor_atual')->nullable();
            $table->date('data_compra')->nullable();
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
        Schema::dropIfExists('equipamentos');
    }
}

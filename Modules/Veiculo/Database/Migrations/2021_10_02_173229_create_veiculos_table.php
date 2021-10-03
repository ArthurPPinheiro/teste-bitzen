<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {//'placa', 'nome_veiculo', 'tipo_combustivel', 'fabricante', 'ano_fabricacao', 'capacidade_tanque', 'observacoes'
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa');
            $table->string('nome_veiculo');
            $table->string('tipo_combustivel');
            $table->string('fabricante');
            $table->string('ano_fabricacao');
            $table->string('capacidade_tanque');
            $table->text('observacoes')->nullable();
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
        Schema::dropIfExists('veiculos');
    }
}

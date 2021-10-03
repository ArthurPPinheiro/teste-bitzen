<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbastecimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abastecimentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('veiculo_id');
            $table->unsignedBigInteger('motorista_id');
            $table->date('data');
            $table->string('tipo_combustivel');
            $table->integer('quantidade_combustivel');
            $table->timestamps();

            $table->foreign('veiculo_id')->references('id')->on('veiculos');
            $table->foreign('motorista_id')->references('id')->on('motoristas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abastecimentos');
    }
}

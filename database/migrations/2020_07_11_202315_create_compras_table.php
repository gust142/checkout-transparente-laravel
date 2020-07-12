<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pagamentoId')->unsigned();
            $table->integer('userId')->unsigned();
            $table->integer('enderecoId')->unsigned();
            $table->integer('transportadoraId')->unsigned();
            $table->integer('codRastreio');
            $table->foreign('pagamentoId')->references('id')->on('pagamentos');
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('enderecoId')->references('id')->on('enderecos');
            $table->foreign('transportadoraId')->references('id')->on('transportadoras');
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
        Schema::dropIfExists('compras');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompraProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_produtos', function (Blueprint $table) {
            $table->integer('compraId')->unsigned();
            $table->integer('produtoId')->unsigned();
            $table->integer('quantidade');
            $table->decimal('valor',5,2);
            $table->foreign('produtoId')->references('id')->on('produtos')->onDelete('cascade');
            $table->foreign('compraId')->references('id')->on('compras')->onDelete('cascade');
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
        Schema::dropIfExists('compra_produtos');
    }
}

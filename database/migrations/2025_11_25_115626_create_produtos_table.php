<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string("barras")->nullable();
            $table->string("referencia")->nullable();
            $table->string("nome");
            $table->string("medida", 4)->nullable();
            $table->integer("categoria_id");
            $table->integer("marca_id");
            $table->integer("fornecedor_id");
            $table->decimal("preco_compra",15,4)->default(0);
            $table->decimal("preco_venda",15,4)->default(0);
            $table->integer("estoque")->default(0);
            $table->smallInteger("ativo")->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}

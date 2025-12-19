<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimentacaoTable extends Migration
{


    public function up()
    {
        Schema::create('movimentacao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produto_id')->constrained('produtos');
            $table->string('nome');
            $table->enum('tipo_movimentacao', ['ENTRADA', 'SAIDA']);
            $table->integer('quantidade');
            $table->timestamps();
            $table->softDeletes(); 
        });
    }


    public function down()
    {
        Schema::dropIfExists('movimentacao');
    }
}

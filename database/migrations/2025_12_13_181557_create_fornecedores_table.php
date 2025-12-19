<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("cgc", 14);
            $table->enum("tipo_pessoa", ['F', 'J'])->default('F');
            $table->string("email")->nullable();
            $table->string("telefone")->nullable();
            $table->string("endereco")->nullable();
            $table->string("bairro")->nullable();
            $table->string("cidade")->nullable();
            $table->string("uf", 2)->nullable();
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
        Schema::dropIfExists('fornecedores');
    }
}

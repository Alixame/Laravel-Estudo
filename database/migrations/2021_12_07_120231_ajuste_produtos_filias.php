<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjusteProdutosFilias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Criação da Tabela de Filiais
        Schema::create('filiais', function(Blueprint $table){
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        // Criação da Tabela INTERMEDIARIA de Produto_Filiais
        Schema::create('produto_filiais', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
            $table->timestamps();
            
            // Criando Chaves Estrangeiras
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });


        // Removendo Campos da Tabela Produtos
        Schema::table('produtos', function(Blueprint $table){
            $table->dropColumn([
                'preco_venda',
                'estoque_minimo',
                'estoque_maximo'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Adicionando Campos na Tabela Produto
        Schema::table('produtos', function(Blueprint $table){
            $table->decimal('preco_venda', 8, 2);
            $table->integer('estoque_minimo');
            $table->integer('estoque_maximo');
        });

        // Excluir Tabela INTERMEDIARIA de Produto_Filiais
        Schema::dropIfExists('produto_filiais');
        
        // Excluir Tabela das Filiais
        Schema::dropIfExists('filiais');
    }
}

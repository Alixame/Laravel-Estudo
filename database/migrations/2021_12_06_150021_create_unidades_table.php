<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Criando Tabela de Unidades de Medida
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('unidade', 5);
            $table->string('descricao', 30);
            $table->timestamps();
        });

        // Adicionando Relação com a Tabela Produtos
        Schema::table('produtos', function (Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        // Adicionando Relação com a Tabela Detalhes de Produtos
        Schema::table('produtos_detalhes', function (Blueprint $table){
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        // Removendo Relação com a Tabela Detalhes de Produtos
        Schema::table('produtos_detalhes', function (Blueprint $table){
            // REMOVENDO INDICE DE CHAVE ESTRANGEIRA
            $table->dropForeign('produtos_detalhes_unidade_id_foreign');
            // REMOVENDO CAMPO DE CHAVE ESTRANGEIRA
            $table->dropColumn('unidade_id');
        });

        // Removendo Relação com a Tabela Produtos
        Schema::table('produtos', function (Blueprint $table){
            // REMOVENDO INDICE DE CHAVE ESTRANGEIRA
            $table->dropForeign('produtos_unidade_id_foreign');
            // REMOVENDO CAMPO DE CHAVE ESTRANGEIRA
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
}

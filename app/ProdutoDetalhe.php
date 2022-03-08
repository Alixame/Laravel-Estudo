<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    protected $table = 'produtos_detalhes';

    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura',  'unidade_id'];

    // USANDO BOAS PRATICAS DO LARAVEL PARA PEGAR DADOS RELACIONADOS 1 PRA 1 (METODO 'PERTENCE A' - OU SEJA PRODUTO_DETALHE 'PERTENCE A' PRODUTO)
    public function produto(){
        return $this->belongsTo('App\Produto');
    }
}

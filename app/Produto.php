<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    // USANDO BOAS PRATICAS DO LARAVEL PARA PEGAR DADOS RELACIONADOS 1 PRA 1 (METODO 'TEM UM' - OU SEJA PRODUTO 'TEM UM' PRODUTO_DETALHE)
    public function produtoDetalhe() {
        return $this->hasOne('App\ProdutoDetalhe');
    }
}

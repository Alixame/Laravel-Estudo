<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;

    // Definindo nome correto da tabela no banco de dados
    protected $table = "fornecedores";

    // Definindo campos da tabela que podem ser recuperados e alterados
    protected $fillable = ['nome','site','uf','email'];

    // USANDO BOAS PRATICAS DO LARAVEL PARA PEGAR DADOS RELACIONADOS 1 PRA N (METODO 'POSSUI MUITOS' - OU SEJA FORNECEDOR 'POSSUI MUITOS' PRODUTOS)
    public function produtos(){
        return $this->hasMany('App\Produto');
    }
}   

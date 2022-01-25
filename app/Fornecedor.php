<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    // Definindo nome correto da tabela no banco de dados
    protected $table = "fornecedores";

    // Definindo campos da tabela que podem ser recuperados e alterados
    protected $fillable = ['nome','site','uf','email'];
}   

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{   
     // Definindo nome correto da tabela no banco de dados
     protected $table = "site_contatos";

     // Definindo campos da tabela que podem ser recuperados e alterados
     protected $fillable = ['nome', 'telefone', 'email', 'motivo_contato', 'mensagem'];

}

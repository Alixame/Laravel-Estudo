<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{   
     // Definindo nome correto da tabela no banco de dados
     protected $table = "site_contatos";

     // Definindo campos da tabela que podem ser recuperados e alterados
     protected $fillable = ['nome', 'telefone', 'email', 'motivo_contato', 'mensagem'];


        /**
         * Undocumented function
         *
         * @param Array $contatos
         * @return void
         */
        static function mostrar(Array $contatos){

            $i = 0;

            while($i <= 100){

                echo '
                ID: '.$contatos[$i]['id'].'
                Nome: '.$contatos[$i]['nome'].'
                Telefone: '.$contatos[$i]['telefone'].'
                Email: '.$contatos[$i]['email'].'
                Motivo: '.$contatos[$i]['motivo_contato'].'
                Mensagem: '.$contatos[$i]['mensagem'].'
                -------------------------------------------';

                $i++;

            }
        }
}

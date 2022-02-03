<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContato extends Model
{   
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

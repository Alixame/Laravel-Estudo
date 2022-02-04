<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;

class PrincipalController extends Controller{

    public function principal(){

        // ANTES DA CRIAÇÃO DA TABELA NO BANCO PARA ARMAZENAR DADOS DO MOTIVO CONTATO
        /* 
        $motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];
        */

        // DEPOIS DA CRIAÇÃO DA TABELA
        $motivo_contatos = MotivoContato::all();

        return view('site.principal', ['motivo_contatos' => $motivo_contatos]);

    }

}

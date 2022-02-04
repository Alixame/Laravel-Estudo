<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller{

    /**
     *  METODO RESPONSAVEL POR RENDERIZAR A PAGINA 'ENTRE EM CONTATO'
     *
     * @return view
     */
    public function contato(){
        
        $motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];

        return view('site.contato', ['titulo' => 'Super Gestão | Site Contato' , 'motivo_contatos' => $motivo_contatos]);

    }

    /**
     * METODO RESPONSAVEL POR SALVAR OS DADOS DO FORMULARIO NO BANCO
     *
     * @param Request $formData - VARIAVEL QUE RECEBE OS DADOS DO FORMULARIO
     * @return void
     */
    public function salvar(Request $formData){

        // 1º METODO DE SALVAR O DADO DO FORMULARIO NO BANCO (METODO UTILIZADO PARA TRATAMENTO DE INFORMAÇÃO)
        /*
        $contato = new SiteContato();
        $contato->nome = $formData->input("nome");
        $contato->telefone = $formData->input("telefone");
        $contato->email = $formData->input("email");
        $contato->motivo_contato = $formData->input("motivo_contato");
        $contato->mensagem = $formData->input("mensagem");
        $contato->save();
        */

        // 2º METODO DE SALVAR O DADO DO FORMULARIO NO BANCO (METODO PRATICO)
        /*
        $contato = new SiteContato();
        $contato->fill($formData->all());
        $contato->save();
        */

        // 3º METODO DE SALVAR O DADO DO FORMULARIO NO BANCO (METODO RAPIDO)
        /*
        $contato = new SiteContato();
        $contato->create($formData->all());
        */

        // VALIDANDO CAMPOS DO FORMULARIO RECEBIDOS VIA POST
        $formData->validate([
            'nome' => 'required|max:50', // VALIDANDO QUE O CAMPO NOME NÃO PODE SER NULO NEM CONTER MAIS DE 50 CARACTERS
            'telefone' => 'required', // VALIDANDO QUJE O CAMPO TELEFONE NÃO PODE SER NULO
            'email' => 'required|email:rfc,dns', // VALIDANDO QUE O CAMPO DE EMAIL NÃO PODE SER NULO E DEVE SER UM EMAIL VALIDO
            'motivo_contato' => 'required', // VALIDANDO QUE O CAMPO MOTIVO CONTATO NÃO PODE SER NULO
            'mensagem' => 'required|max:250', // VALIDANDO QUE O CAMPO MENSAGEM NÃO PODE SER NULO NEM CONTER MAIS DE 250 CARACTERS
        ]);

    }


}

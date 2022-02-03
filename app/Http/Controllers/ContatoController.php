<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller{

    /**
     *  METODO RESPONSAVEL POR RENDERIZAR A PAGINA 'ENTRE EM CONTATO'
     *
     * @param Request $formData - VARIAVEL QUE RECEBE OS DADOS DO FORMULARIO
     * @return view
     */
    public function contato(Request $formData){

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
        $contato = new SiteContato();
        $contato->fill($formData->all());
        $contato->save();

        // 3º METODO DE SALVAR O DADO DO FORMULARIO NO BANCO (METODO RAPIDO)
        /*
        $contato = new SiteContato();
        $contato->create($formData->all());
        */

        return view('site.contato', ['titulo' => 'Super Gestão | Site Contato']);

    }
}

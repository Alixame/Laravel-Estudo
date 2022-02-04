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

        return view('site.contato', ['titulo' => 'Super Gestão | Site Contato']);

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

        $formData->validate([
            'nome' => 'required|max:50',
            'telefone' => 'required',
            'email' => 'required|email:rfc,dns',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:250',
        ]);

    }


}

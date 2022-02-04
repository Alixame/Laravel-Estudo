<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller{

    /**
     *  METODO RESPONSAVEL POR RENDERIZAR A PAGINA 'ENTRE EM CONTATO'
     *
     * @return view
     */
    public function contato(){
        
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

        return view('site.contato', ['titulo' => 'Super Gestão | Site Contato' , 'motivo_contatos' => $motivo_contatos]);

    }

    /**
     * METODO RESPONSAVEL POR SALVAR OS DADOS DO FORMULARIO NO BANCO
     *
     * @param Request $formData - VARIAVEL QUE RECEBE OS DADOS DO FORMULARIO
     * @return redirect // REDIRECIONA PARA A PAGINA CONTATO
     */
    public function salvar(Request $formData){

        // CRIANDO UM ARRAY DE CONFIGURAÇÃO DE VALIDAÇÕES PARA OS CAPOS DO FORMULARIO
        $configCampos = [
            'nome' => 'required|max:50', // VALIDANDO QUE O CAMPO NOME NÃO PODE SER NULO NEM CONTER MAIS DE 50 CARACTERES
            'telefone' => 'required', // VALIDANDO QUJE O CAMPO TELEFONE NÃO PODE SER NULO
            'email' => 'email', // VALIDANDO QUE O CAMPO DE EMAIL NÃO PODE SER NULO E DEVE SER UM EMAIL VALIDO
            'motivo_contato_id' => 'required', // VALIDANDO QUE O CAMPO MOTIVO CONTATO NÃO PODE SER NULO
            'mensagem' => 'required|max:250', // VALIDANDO QUE O CAMPO MENSAGEM NÃO PODE SER NULO NEM CONTER MAIS DE 250 CARACTERES
        ];
        
        // CRIANDO ARRAY DE MENSAGENS PADRÕES DE ERRO
        $mensagensErro = [
            'nome.required' => 'O campo "Nome" precisa ser preenchido!',
            'nome.max' => 'O campo "Nome" precisa conter no maximo 50 caracteres!',
            'telefone.required' => 'O campo "Telefone" precisa ser preenchido!',
            'email.email' => 'O "Email" precisa ser um endereço valido!',
            'motivo_contato_id.required' => 'O campo "Motivo Contato" precisa ser preenchido',
            'mensagem.required' => 'O campo "Mensagem" precisa ser preenchido!',
            'mensagem.max' => 'O campo "Mensagem" precisa conter no maximo 50 caracteres!'
        ];

        // VALIDANDO CAMPOS DO FORMULARIO RECEBIDOS VIA POST
        $formData->validate($configCampos,$mensagensErro);
        
        // 1º METODO DE SALVAR O DADO DO FORMULARIO NO BANCO
        $contato = new SiteContato();
        $contato->nome = $formData->input("nome");
        $contato->telefone = $formData->input("telefone");
        $contato->email = $formData->input("email");
        $contato->motivo_contato = $formData->input("motivo_contato_id");
        $contato->mensagem = $formData->input("mensagem");
        $contato->save();

        // 2º METODO DE SALVAR O DADO DO FORMULARIO NO BANCO (METODO PRATICO)
        /*
        $contato = new SiteContato();
        $contato->fill($formData->all());
        $contato->save();
        */

        // 3º METODO DE SALVAR O DADO DO FORMULARIO NO BANCO (METODO RAPIDO)
        /*$contato = new SiteContato();
        $contato->create($formData->all());*/   

        return redirect()->route('site.contato');

    }


}

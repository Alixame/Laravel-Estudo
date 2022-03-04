<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class LoginController extends Controller
{
    //

    public function index(){

        return view('site.login',['titulo'=>'Login']);

    }


    public function autenticar(Request $request)
    {
        // regras de validação dos campos do formulario
        $regras = [ 
            'usuario' => 'email',
            'senha' => 'required'
        ];

        // mensagens de feedback de validação (ERRO)
        $feedback = [
            'usuario.email' => 'O campo usuario é obrigatorio',
            'senha.required' => 'O campo senha é obrigatorio'
        ];

        $request->validate($regras, $feedback);

        // RECUPERANDO OS DADOS DO FORMULARIO
        $email = $request->get('usuario');
        $senha = $request->get('senha');

        // INSTANCIANDO OBJETO DA CLASSE USUARIO
        $user = new User();

        // BUSCANDO SE EXISTE ALGUM REGISTRO NA TABELA DE USUARIOS COM OS DADOS DO FORMULARIO
        $user = $user->where('email', $email)->where('password', $senha)->get()->first();

        // VERIFICANDO SE A CONSULTA TROUXE ALGUM USUARIO VALIDO
        if (isset($user->name)) {

            // SE SIM: PERMITIR ACESSO -> CRIAR SUPERGLOBAL E REDIRECIONAR
            session_start();
            $_SESSION['name'] = $user->name;
            $_SESSION['email'] = $user->email;

            return redirect()->route('admin.panel');

        } else {

            // SE NÃO: NEGAR ACESSO -> RETORNANDO MENSAGEM DE ERRO
            return redirect()->route('site.login')->withErrors(["invalido"=>"Usuario ou senha invalido!"]);
        
        }

    }

    public function sair(){
        
    }
}

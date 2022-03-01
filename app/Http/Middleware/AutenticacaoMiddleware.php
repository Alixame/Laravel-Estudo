<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        session_start();

        // VERIFICANDO SE EXISTE A VARIAVEL EMAIL DENTRO DA SESSÃO
        if(isset($_SESSION['email']) && $_SESSION != ''){
            // SE SIM: CONTINUA PARA A PAGINA
            return $next($request);
        } else {
            // SE NÃO: REDIRECIONA PARA A TELA DE LOGIN NEGANDO ACESSO -> RETORNANDO MENSAGEM DE ERRO
            return redirect()->route('site.login')->withErrors(["invalido"=>"É Necessario fazer login para ter acesso!"]);
        }
        
    }
}

<?php

use Illuminate\Support\Facades\Route;

// QUANDO FOR UTILIZAR UM MIDDLEWARE NÃO SE ESQUEÇA DE DAR UM USE NA CLASSE
use App\Http\Middleware\LogAcessoMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*

------- MODO CONVENCIONAL DE UTILIZAR ROTAS -------

Route::get('/', function () {
    return "Ola seja bem vindo ao curso!";
});

Route::get('/sobre-nos', function () {
    return "SOBRE NÓS";
});

Route::get('/contato', function () {
    return "CONTATO";
});

*/


// ------- UTILIZANDO TECNOLOGIA LARAVEL NAS ROTAS -------

//APARTIR DA CLASSE -ROUTER- BASTA CHAMAR A FUNÇÃO GET (RENDERIZA PAGINA) PASSANDO COMO PARAMETRO:
//IDENTIFICADOR DE ROTA = "/"(POR EXEMPLO) E O CONTROLADOR QUE DESEJE USAR,EM SEGUIDA BASTA PASSAR POR @ A FUNÇÃO DO CONTROLADOR A SER CHAMADA. 
//PODEMOS USAR A FUNÇÃO -NAME- DA CLASSE -ROUTER- PARA APELIDAR ESTÁ ROTA, SENDO POSSIVEL CHAMAR ELA ATRAVES DO APELIDO E NÃO MAIS PELO SEU IDENTIFICADOR (ISSO FACILITARÁ NA CONTRUÇÃO DE SEU SITE)


// PARA ADICIONAR UM MIDDLEWARE A ROTA BASTA CHAMAR middleware(), PASSANDO A CLASSE DO MIDDLEWARE OU O SEU APELIDO
Route::middleware('log.acesso')
->get('/','PrincipalController@principal')->name("site.index");

Route::get('/sobre-nos','SobreNosController@sobreNos')->name("site.sobre-nos");

Route::get('/contato','ContatoController@contato')->name("site.contato");
Route::post('/contato','ContatoController@salvar')->name("site.contato");



Route::get('/login', function () {
    return "LOGIN";
})->name("site.login");

Route::get('/admin', function () {
    return "PAINEL";
})->name("admin.panel");

Route::prefix("/admin")->group( function(){

    Route::get('/produtos', function (){
        return "PRODUTOS";
    })->name("admin.produtos");

    Route::get('/fornecedores', 'FornecedorController@index')->name("admin.fornecedores");
    
    Route::get('/clientes', function () {
        return "CLIENTES";
    })->name("admin.clientes");

});

Route::fallback(function(){
    return 'Está rota não existe!<br><a href="'.route('site.index').'">Clica Aqui</a> para retornar a pagina princial!';
});

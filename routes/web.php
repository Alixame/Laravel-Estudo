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

Route::get('/login','LoginController@index')->name("site.login");
Route::post('/login','LoginController@autenticar')->name("site.login");



Route::middleware('autenticacao')->prefix("/admin")->group( function(){

    Route::get('', 'PainelController@index')->name("admin.painel");

    Route::get('/sair', 'LoginController@sair')->name("admin.sair");
        
    Route::get('/cliente', 'ClienteController@index')->name("admin.cliente");

    Route::get('/produto', 'ProdutoController@index')->name("admin.produto");

    Route::prefix('/fornecedor')->group(function () {
        Route::get('', 'FornecedorController@index')->name("admin.fornecedor");
        Route::post('/listar', 'FornecedorController@listar')->name("admin.fornecedor.listar");
        Route::get('/adicionar', 'FornecedorController@adicionar')->name("admin.fornecedor.adicionar");
    });


});

Route::fallback(function(){
    return 'Está rota não existe!<br><a href="'.route('site.index').'">Clica Aqui</a> para retornar a pagina princial!';
});

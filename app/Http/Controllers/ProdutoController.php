<?php

namespace App\Http\Controllers;

use App\Produto;
use App\ProdutoDetalhe;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller {

    // DEFININDO REGRAS DE VALIDAÇÃO PARA O FORMULARIO DE CRIAÇÃO
    protected $regras = [
        'nome' => 'required|min:3|max:40',
        'descricao' => 'required|min:3|max:2000',
        'peso' => 'required|integer',
        'unidade_id' => 'exists:unidades,id', // esse tipo de validação verifica se o dado informado existe na coluna da tabela informada exists:<tabela>,<coluna>
    ];

    // DEFININDO MENSAGENS PERSONALIZADAS CASO OCORRA ERRO NA VALIDAÇÃO
    protected $feedbacks = [
        'required' => 'O campo :attribute deve ser preenchido',
        'nome.min' => 'O campo nome deve conter no minimo 3 caracteres',
        'nome.max' => 'O campo nome deve conter no maximo 40 caracteres',
        'descricao.min' => 'O campo descricao deve conter no minimo 3 caracteres',
        'descricao.min' => 'O campo descricao deve conter no maximo 2000 caracteres',
        'peso.integer' => 'O campo peso deve ser do tipo inteiro',
        'unidade_id.exists' => 'O campo unidade de medida informado não existe'
    ];

    /**
     * MÉTODO RESPONSAVEL POR RENDERIZAR A TELA DA TABELA DOS REGISTROS.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response ( VIEW )
     */
    public function index(Request $request){

        // PEGANDO DADOS DO BANCO UTILIZANDO PAGINAÇÃO (SEMELHANTE AO METODO ALL MAS NESTE EXISTE NAVEEGAÇÃO ENTRE PAGINAS JÁ PRONTA)
        $produtos = Produto::with(['produtoDetalhe'])->paginate(10);

        /* METODO MANUAL DE BUSCAR RELAÇÃO 1 PRA 1
        foreach ($produtos as $key => $produto) {
            //print_r($produto->getAttributes());

            $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();

            if (isset($produtoDetalhe)) {
                //print_r($produtoDetalhe->getAttributes());

                $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
                $produtos[$key]['largura'] = $produtoDetalhe->largura;
                $produtos[$key]['altura'] = $produtoDetalhe->altura;

            }
       
        }*/

        /**
         *  RETORNANDO VIEW (INDEX)
         * 
         * PASSANDO AS VARIAVEIS $produtos e $request PARA A VIEW
         */
        return view('site.admin.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);

        // OBS: A variavel $request é necessaria para que a paginação não quebre

    }

    /**
     * MÉTODO RESPONSAVEL POR RENDERIZAR O FORMULARIO DE CRIAÇÃO DE UM REGISTRO
     *
     * @return \Illuminate\Http\Response ( VIEW )
     */
    public function create(){

        // PEGANDO TODOS OS REGISTROS DE UNIDADES PARA SEREM USADOS NO SELECT DO FORMULARIO
        $unidades = Unidade::all();

        /**
         *  RETORNANDO VIEW (CREATE)
         * 
         * PASSANDO A VARIAVEL $unidades PARA A VIEW
         */
        return view('site.admin.produto.create', ['unidades' => $unidades]);
        
        /**
         *  RETORNANDO VIEW (CREATE-EDIT)
         * 
         *  OBS: NO CADASTRO E NA ATUALIZAÇÃO DE REGISTROS PODE-SE USAR O MESMO FORMULARIO, BASTA FAZER ALGUMAS VALIDAÇÕES
         * 
         * PASSANDO A VARIAVEL $unidades PARA A VIEW
         */
        // return view('site.admin.produto.create-edit', ['unidades' => $unidades]);

    }

    /**
     * MÉTODO RESPONSAVEL POR PEGAR OS DADOS DO FORMULARIO, VALIDAR E SALVAR NO BD
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response ( REDIRECT )
     */
    public function store(Request $request){

        // VALIDANDO CAMPOS DO FORMULARIO
        $request->validate($this->regras, $this->feedbacks);

        // APÓS VALIDAR OS DADOS, AS INFORMAÇÕES DO FORMULARIO É SALVA NO BD
        Produto::create($request->all());

        // REDIRECIONANDO PARA A VIEW (INDEX)
        return redirect()->route('produto.index');

    }

    /**
     * MÉTODO RESPONSAVEL POR RENDERIZAR DADOS ESPECIFICOS DE UM UNICO REGISTRO
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response ( VIEW )
     */
    public function show(Produto $produto){

        /**
         *  RETORNANDO VIEW (SHOW)
         * 
         * PASSANDO A VARIAVEL $produto PARA A VIEW
         */
        return view('site.admin.produto.show', ['produto' => $produto]);
    
    }

    /**
     * MÉTODO RESPONSAVEL POR RENDERIZAR O FORMULARIO DE EDIÇÃO COM OS DADOS DO REGISTRO
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response ( VIEW )
     */
    public function edit(Produto $produto){
        
        // PEGANDO TODOS OS REGISTROS DE UNIDADES PARA SEREM USADOS NO SELECT DO FORMULARIO 
        $unidades = Unidade::all();

         /**
         *  RETORNANDO VIEW (EDIT)
         * 
         * PASSANDO AS VARIAVEIS $produto E $unidades PARA A VIEW
         */
        return view('site.admin.produto.edit', ['produto' => $produto,  'unidades' => $unidades]);

        /**
         *  RETORNANDO VIEW (CREATE-EDIT)
         * 
         *  OBS: NO CADASTRO E NA ATUALIZAÇÃO DE REGISTROS PODE-SE USAR O MESMO FORMULARIO, BASTA FAZER ALGUMAS VALIDAÇÕES
         * 
         * PASSANDO A VARIAVEL $unidades PARA A VIEW
         */
        //return view('site.admin.produto.create-edit', ['produto' => $produto, 'unidades' => $unidades]);
    
    }

    /**
     * MÉTODO RESPONSAVEL POR PEGAR OS DADOS DO FORMULARIO DE EDIÇÃO E SALVAR NO BD
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response ( REDIRECT )
     */
    public function update(Request $request, Produto $produto){

        // VALIDANDO CAMPOS DO FORMULARIO
        $request->validate($this->regras, $this->feedbacks);

        // ATUALIZANDO DADOS DO REGISTRO
        $produto->update($request->all());

        /**
         *  REDIRECIONANDO PARA ROTA (SHOW)
         * 
         * PASSANDO A VARIAVEL $produto PARA A ROTA
         */
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    
    }

    /**
     * MÉTODO RESPONSAVEL POR EXCLUIR UM REGISTRO
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response ( REDIRECT )
     */
    public function destroy(Produto $produto){

        // DELETANDO O REGISTRO DO BD
        $produto->delete();

        /**
         *  REDIRECIONANDO PARA ROTA (INDEX)
         */
        return redirect()->route('produto.index');
    
    }
}

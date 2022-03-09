<?php

namespace App\Http\Controllers;

use App\Pedido;
use App\PedidoProduto;
use App\Produto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    protected $regras = [
        'produto_id' => 'exists:produtos,id',
        'quantidade' => 'required'
    ];

    protected $feedback = [
        'produto_id.exists' => 'O campo informado não existe',
        'quantidade.required' => 'O campo :attribute é obrigatorio'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();

        return view('site.admin.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $request->validate($this->regras, $this->feedback);

        $pedidoProduto = new PedidoProduto;

        // ADICIONANDO CAMPOS DE RELAÇÃO - FORMA PADRÃO
        /*
        $pedidoProduto->pedido_id = $pedido->id;
        $pedidoProduto->produto_id = $request->get('produto_id');
        $pedidoProduto->quantidade = $request->get('quantidade');
        $pedidoProduto->save();
        */

        // ADICIONANDO CAMPOS DE RELAÇÃO - FORMA UTILIZANDO ATTACH
        $pedido->produtos()->attach([
            $request->get('produto_id') => ['quantidade' => $request->get('quantidade')]
        ]);

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(/*Pedido $pedido, Produto $produto*/ PedidoProduto $pedidoProduto, $pedido_id)
    {
        //converncional
        /*PedidoProduto::where([
            'pedido_id' => $pedido->id,
            'produto_id' => $produto->id
        ])->delete();
        */

        // utilizando detach
        // $pedido->produtos()->detach($produto->id);    

        // utilizando metodo do proprio objeto
        $pedidoProduto->delete();

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido_id]);
    }
}

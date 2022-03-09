@extends('site.admin.layout.basico')

@section('titulo',' | Produtos - Pedido')

@section('conteudo')

<div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <h1>Adicionar - Produto ao Pedido</h1>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">

        <h3>Detalhes do Pedido</h3>
        <p>Id do pedido : {{ $pedido->id}}</p>
        <p>Cliente: {{ $pedido->cliente_id }}</p>


        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <div>
                <h3>Produtos</h3>
                <table width="100%" border="1">
                    <thead>
                        <tr>
                            <th>ID Produto</th>
                            <th>Nome Produto</th>
                            <th>Data de inclusão</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
                            <td>
                                {{-- METODO CONVENCIONAL
                                <form id="form_{{$pedido->id}}_{{$produto->id}}" method="post" action="{{ route('pedido-produto.destroy', ['pedido' => $pedido->id, 'produto' => $produto->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    
                                    <a href="#" onclick="document.getElementById('form_{{$pedido->id}}_{{$produto->id}}').submit()">Excluir</a>
                                    
                                </form>
                                --}}
                                <!-- METODO UTILIZANDO ID DO PROPRIO OBJETO E NÃO MAIS AS CHAVES ESTRAGEIRAS -->
                                <form id="form_{{$produto->pivot->id}}" method="post" action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedido_id' => $pedido->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                
                                    <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">Excluir</a>
                                    
                                </form>
                            </td>
                        </tr>  
                        @endforeach
                    </tbody>
                </table>
            </div>

            @component('site.admin.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
            @endcomponent
        </div>
    </div>

</div>

@endsection
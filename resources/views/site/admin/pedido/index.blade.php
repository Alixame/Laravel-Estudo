@extends('site.admin.layout.basico')

@section('titulo',' | Pedidos')

@section('conteudo')

<div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <h1>Listar - Pedidos</h1>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.create') }}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
            <table border="1" width='100%' style="margin-top: 10px;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id }}</td>
                        <td>{{ $pedido->cliente_id }}</td>
                        <td>
                            <a href="{{ route('pedido-produto.create',['pedido' => $pedido->id]) }}">Adiciona Produto</a>
                            <a href="{{ route('pedido.show',['pedido' => $pedido->id]) }}">Visualizar</a>
                            <a href="{{ route('pedido.edit',['pedido' => $pedido->id]) }}">Editar</a>
                            <form id="form_{{$pedido->id}}" method="POST" action="{{ route('pedido.destroy',['pedido' => $pedido->id]) }}">
                                @csrf
                                @method('DELETE')
                                <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()">Excluir</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{ $pedidos->appends($request)->links() }}
            <br>
            Exibindo {{ $pedidos->count() }} registros de {{ $pedidos->total() }} (De {{ $pedidos->firstItem() }} a {{ $pedidos->lastItem() }})  

        </div>
    </div>

</div>

@endsection
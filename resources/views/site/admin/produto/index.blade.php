@extends('site.admin.layout.basico')

@section('titulo',' | Produtos')

@section('conteudo')

<div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <h1>Listar - Produtos</h1>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('produto.create') }}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
            <table border="1" width='100%' style="margin-top: 10px;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
                        <td>Comprimento</td>
                        <td>Largura</td>
                        <td>Altura</td>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->peso }}</td>
                        <td>{{ $produto->unidade_id }}</td>
                        <td>{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
                        <td>{{ $produto->produtoDetalhe->largura ?? '' }}</td>
                        <td>{{ $produto->produtoDetalhe->altura ?? '' }}</td>
                        <td>
                            <a href="{{ route('produto.show',['produto' => $produto->id]) }}">Visualizar</a>
                            <a href="{{ route('produto.edit',['produto' => $produto->id]) }}">Editar</a>
                            <form id="form_{{$produto->id}}" method="POST" action="{{ route('produto.destroy',['produto' => $produto->id]) }}">
                                @csrf
                                @method('DELETE')
                                <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{ $produtos->appends($request)->links() }}
            <br>
            Exibindo {{ $produtos->count() }} registros de {{ $produtos->total() }} (De {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})  

        </div>
    </div>

</div>

@endsection
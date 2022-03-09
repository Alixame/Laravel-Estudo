@extends('site.admin.layout.basico')

@section('titulo',' | Clientes')

@section('conteudo')

<div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <h1>Listar - Clientes</h1>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('cliente.create') }}">Novo</a></li>
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
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->nome }}</td>
                        <td>
                            <a href="{{ route('cliente.show',['cliente' => $cliente->id]) }}">Visualizar</a>
                            <a href="{{ route('cliente.edit',['cliente' => $cliente->id]) }}">Editar</a>
                            <form id="form_{{$cliente->id}}" method="POST" action="{{ route('cliente.destroy',['cliente' => $cliente->id]) }}">
                                @csrf
                                @method('DELETE')
                                <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()">Excluir</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{ $clientes->appends($request)->links() }}
            <br>
            Exibindo {{ $clientes->count() }} registros de {{ $clientes->total() }} (De {{ $clientes->firstItem() }} a {{ $clientes->lastItem() }})  

        </div>
    </div>

</div>

@endsection
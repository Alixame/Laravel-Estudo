@extends('site.admin.layout.basico')

@section('titulo',' | Fornecedores')

@section('conteudo')

<div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <h1>Listar - Fornecedores</h1>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('admin.fornecedor.adicionar')}}">Novo</a></li>
            <li><a href="{{ route('admin.fornecedor')}} ">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin-left: auto; margin-right: auto;">
            <table border="1" width='100%' style="margin-top: 10px;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Site</th>
                        <th>UF</th>
                        <th>Email</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($fornecedores as $fornecedor)
                    <tr>
                        <td>{{ $fornecedor->id }}</td>
                        <td>{{ $fornecedor->nome }}</td>
                        <td>{{ $fornecedor->site }}</td>
                        <td>{{ $fornecedor->uf }}</td>
                        <td>{{ $fornecedor->email }}</td>
                        <td>
                            <a href="{{ route('admin.fornecedor.editar', $fornecedor->id) }}">Editar</a>
                            <a href="{{ route('admin.fornecedor.excluir', $fornecedor->id) }}">Excluir</a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <p>Lista de Produtos</p>
                            <table border="1" style="margin: 20px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($fornecedor->produtos as $produto)
                                    <tr>
                                        <td>{{ $produto->id }}</td>
                                        <td>{{ $produto->nome }}</td>
                                    </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
            {{ $fornecedores->appends($request)->links() }}
            <br>
            Exibindo {{ $fornecedores->count() }} registros de {{ $fornecedores->total() }} (De {{ $fornecedores->firstItem() }} a {{ $fornecedores->lastItem() }})  

        </div>
    </div>

</div>

@endsection
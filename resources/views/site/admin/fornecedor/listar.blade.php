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
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            ... Listar ...
        </div>
    </div>

</div>

@endsection
@extends('site.admin.layout.basico')

@section('titulo',' | Detalhes do Produto')

@section('conteudo')

<div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <h1>Adicionar - Detalhe do Produto</h1>
    </div>

    <div class="menu">
        <ul>
            <li><a href="">Voltar</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            @component('site.admin.produto_detalhe._components.form_create_edit', ['unidades' => $unidades])
            @endcomponent
        </div>
    </div>

</div>

@endsection
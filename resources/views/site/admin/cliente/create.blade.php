@extends('site.admin.layout.basico')

@section('titulo',' | Clientes')

@section('conteudo')

<div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <h1>Adicionar - Cliente</h1>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            @component('site.admin.cliente._components.form_create_edit')
            @endcomponent
        </div>
    </div>

</div>

@endsection
@extends('site.admin.layout.basico')

@section('titulo',' | Pedidos')

@section('conteudo')

<div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <h1>Adicionar - Pedido</h1>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            @component('site.admin.pedido._components.form_create_edit', ['clientes' => $clientes])
            @endcomponent
        </div>
    </div>

</div>

@endsection
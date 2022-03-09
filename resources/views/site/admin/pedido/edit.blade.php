@extends('site.admin.layout.basico')

@section('titulo',' | Pedidos')

@section('conteudo')

<div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <h1>Editar - Pedido</h1>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            @component('site.admin.pedido._components.form_create_edit',['pedido' => $pedido, 'unidades' => $unidades, 'fornecedores' => $fornecedores])
            @endcomponent
        </div>
    </div>

</div>

@endsection
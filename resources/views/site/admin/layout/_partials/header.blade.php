<div class="topo">

    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('admin.painel') }}">Home</a></li>
            <li><a href="{{ route('cliente.index') }}">Cliente</a></li>
            <li><a href="{{ route('admin.fornecedor') }}">Fornecedor</a></li>
            <li><a href="{{ route('produto.index') }}">Produto</a></li>
            <li><a href="{{ route('admin.sair') }}">Sair</a></li>
        </ul>
    </div>
</div>
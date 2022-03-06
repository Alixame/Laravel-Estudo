@extends('site.admin.layout.basico')

@section('titulo',' | Fornecedores')

@section('conteudo')

<div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <h1>Adicionar - Fornecedor</h1>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('admin.fornecedor.adicionar')}}">Novo</a></li>
            <li><a href="{{ route('admin.fornecedor')}} ">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">
            <form action="" method="post">
                @csrf

                <input type="text" name="nome" class="borda-preta" placeholder="Nome">

                <input type="text" name="site" class="borda-preta" placeholder="Site">

                <input type="text" name="uf" class="borda-preta" placeholder="UF">

                <input type="text" name="email" class="borda-preta" placeholder="Email">

                <button type="submit" class="borda-preta">Adicionar</button>

            </form>
        </div>
    </div>

</div>

@endsection
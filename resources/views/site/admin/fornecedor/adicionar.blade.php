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

            {{$msg ?? ''}}

            <form action="{{route('admin.fornecedor.adicionar')}}" method="post">
                @csrf

                <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">

                {{$errors->has('nome')? $errors->first('nome') : ''}}
                <input type="text" name="nome" class="borda-preta" placeholder="Nome" value="{{ $fornecedor->nome ?? old('nome') }}">

                {{$errors->has('site')? $errors->first('site') : ''}}
                <input type="text" name="site" class="borda-preta" placeholder="Site" value="{{ $fornecedor->site ?? old('site')}}">

                {{$errors->has('uf')? $errors->first('uf') : ''}}
                <input type="text" name="uf" class="borda-preta" placeholder="UF" value="{{ $fornecedor->uf ?? old('uf')}}">

                {{$errors->has('email')? $errors->first('email') : ''}}
                <input type="text" name="email" class="borda-preta" placeholder="Email" value="{{ $fornecedor->email ?? old('email')}}">

                <button type="submit" class="borda-preta">Adicionar</button>

            </form>
        </div>
    </div>

</div>

@endsection
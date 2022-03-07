@extends('site.admin.layout.basico')

@section('titulo',' | Produtos')

@section('conteudo')

<div class="conteudo-pagina">

    <div class="titulo-pagina-2">
        <h1>Editar - Produto</h1>
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('produto.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin-left: auto; margin-right: auto;">

            <form action="{{ route('produto.update',['produto' => $produto->id]) }}" method="post">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" value="">

                {{ $errors->has('nome')? $errors->first('nome') : ''}}
                <input type="text" name="nome" class="borda-preta" placeholder="Nome" value="{{ $produto->nome ?? old('nome') }}">

                {{ $errors->has('descricao')? $errors->first('descricao') : ''}}
                <input type="text" name="descricao" class="borda-preta" placeholder="Descrição" value="{{ $produto->descricao ?? old('descricao') }}">

                {{ $errors->has('peso')? $errors->first('peso') : ''}}
                <input type="text" name="peso" class="borda-preta" placeholder="Peso" value="{{ $produto->peso ?? old('peso') }}">

                {{ $errors->has('unidade_id')? $errors->first('unidade_id') : ''}}
                <select name="unidade_id" class="borda-preta">
                    <option value="">-- Selecione uma Unidade de Medida --</option>
                    @foreach ($unidades as $unidade)
                        <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>
                    @endforeach
                </select>

                <button type="submit" class="borda-preta">Atualizar</button>

            </form>
        </div>
    </div>

</div>

@endsection
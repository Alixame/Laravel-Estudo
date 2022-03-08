@if (isset($produto->id))
    <form action="{{ route('produto.update', ["produto" => $produto->id]) }}" method="post">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('produto.store') }}" method="post">
        @csrf
@endif

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
            <option value="{{ $unidade->id }}" {{ ( $produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>
        @endforeach
    </select>

    {{ $errors->has('fornecedor_id')? $errors->first('fornecedor_id') : ''}}
    <select name="fornecedor_id" class="borda-preta">
        <option value="">-- Selecione um Fornecedor --</option>
        @foreach ($fornecedores as $fornecedor)
            <option value="{{ $fornecedor->id }}" {{ ( $produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : '' }}>{{ $fornecedor->nome }}</option>
        @endforeach
    </select>

    <button type="submit" class="borda-preta">{{ isset($produto->id)? 'Atualizar' : 'Adicionar' }}</button>

</form>
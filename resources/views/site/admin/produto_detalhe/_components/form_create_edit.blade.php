@if (isset($produto_detalhe->id))
    <form action="{{ route('produto-detalhe.update', ["produto_detalhe" => $produto_detalhe->id]) }}" method="post">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('produto-detalhe.store') }}" method="post">
        @csrf
@endif

    {{ $errors->has('produto_id')? $errors->first('produto_id') : ''}}
    <input type="text" name="produto_id" class="borda-preta" placeholder="ID do Produto" value="{{ $produto_detalhe->produto_id ?? old('nome') }}">

    {{ $errors->has('comprimento')? $errors->first('comprimento') : ''}}
    <input type="text" name="comprimento" class="borda-preta" placeholder="Comprimento" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}">

    {{ $errors->has('largura')? $errors->first('largura') : ''}}
    <input type="text" name="largura" class="borda-preta" placeholder="Largura" value="{{ $produto_detalhe->largura ?? old('largura') }}">
    
    {{ $errors->has('altura')? $errors->first('altura') : ''}}
    <input type="text" name="altura" class="borda-preta" placeholder="Altura" value="{{ $produto_detalhe->altura ?? old('altura') }}">


    {{ $errors->has('unidade_id')? $errors->first('unidade_id') : ''}}
    <select name="unidade_id" class="borda-preta">
        <option value="">-- Selecione uma Unidade de Medida --</option>
        @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{ ( $produto_detalhe->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{ $unidade->descricao }}</option>
        @endforeach
    </select>

    <button type="submit" class="borda-preta">{{ isset($produto_detalhe->id)? 'Atualizar' : 'Adicionar' }}</button>

</form>
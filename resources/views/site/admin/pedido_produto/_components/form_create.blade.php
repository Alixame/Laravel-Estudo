
<form action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}" method="post">
    @csrf

    {{ $errors->has('produto_id')? $errors->first('produto_id') : ''}}
    <select name="produto_id" class="borda-preta">
        <option value="">-- Selecione um Produto --</option>
        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}" {{  old('produto_id') == $produto->id ? 'selected' : '' }}>{{ $produto->nome }}</option>
        @endforeach
    </select>

    {{ $errors->has('quantidade')? $errors->first('quantidade') : ''}}
    <input type="number" name="quantidade" class="borda-preta" placeholder="Quantidade" value="{{ old('$produto->quantidade')  ?  old('$produto->quantidade') : '' }}">

    <button type="submit" class="borda-preta">Adicionar</button>

</form>
@if (isset($pedido->id))
    <form action="{{ route('pedido.update', ["pedido" => $pedido->id]) }}" method="post">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('pedido.store') }}" method="post">
        @csrf
@endif

    {{ $errors->has('cliente_id')? $errors->first('cliente_id') : ''}}
    <select name="cliente_id" class="borda-preta">
        <option value="">-- Selecione um Cliente --</option>
        @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}" {{ ( $produto->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
        @endforeach
    </select>

    <button type="submit" class="borda-preta">{{ isset($pedido->id)? 'Atualizar' : 'Adicionar' }}</button>

</form>
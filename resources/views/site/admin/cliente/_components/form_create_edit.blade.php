@if (isset($cliente->id))
    <form action="{{ route('cliente.update', ["cliente" => $cliente->id]) }}" method="post">
        @csrf
        @method('PUT')
@else
    <form action="{{ route('cliente.store') }}" method="post">
        @csrf
@endif

    {{ $errors->has('nome')? $errors->first('nome') : ''}}
    <input type="text" name="nome" class="borda-preta" placeholder="Nome" value="{{ $cliente->nome ?? old('nome') }}">

    <button type="submit" class="borda-preta">{{ isset($cliente->id)? 'Atualizar' : 'Adicionar' }}</button>

</form>
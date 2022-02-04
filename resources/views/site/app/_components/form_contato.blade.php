{{ $slot }}

@if ($errors->any())
    @foreach ($errors->all() as $erro)
        {{ $erro }} <br>
    @endforeach
@endif

<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input value="{{ old('nome') }}" name="nome" type="text" placeholder="Nome" class="{{ $class }}">
    <br>
    <input value="{{ old('telefone') }}" name="telefone" type="text" placeholder="Telefone" class="{{ $class }}">
    <br>
    <input value="{{ old('email') }}" name="email" type="text" placeholder="E-mail" class="{{ $class }}">
    <br>
    <select name="motivo_contato_id" class="{{ $class }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ( $motivo_contatos as $motivo_contato )
         <option value="{{$motivo_contato->id}}"{{ old('motivo_contato_id') == $motivo_contato->id ? 'selected' : '' }}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    <br>
    <textarea name="mensagem" class="{{ $class }}" placeholder="Preencha aqui a sua mensagem">@if(old('mensagem') != '') {{ old('mensagem') }} @endif</textarea>
    <br>
    <button type="submit" class="{{ $class }}">ENVIAR</button>
</form>
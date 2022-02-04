{{ $slot }}

{{ $errors }}

<form action="{{ route('site.contato') }}" method="POST">
    @csrf
    <input value="{{ old('nome') }}" name="nome" type="text" placeholder="Nome" class="{{ $class }}">
    <br>
    <input value="{{ old('telefone') }}" name="telefone" type="text" placeholder="Telefone" class="{{ $class }}">
    <br>
    <input value="{{ old('email') }}" name="email" type="text" placeholder="E-mail" class="{{ $class }}">
    <br>
    <select name="motivo_contato" class="{{ $class }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class="{{ $class }}" placeholder="Preencha aqui a sua mensagem">@if(old('mensagem') != '') {{ old('mensagem') }} @endif</textarea>
    <br>
    <button type="submit" class="{{ $class }}">ENVIAR</button>
</form>
@extends('site.layout.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <form action={{ route('site.login') }} method="post">
                    @csrf
                    
                    <!-- MENSAGEM DE ERRO EM FORMATO DE MULTIPLAS LINHAS-->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                <p style="color: red">{{ $error }}</p>
                                @endforeach
                        </div>
                    @endif

                    <!--MENSAGEM DE ERRO EM FORMATO DE LINHA UNICA: <p style="color: red">{{ $errors->has('usuario') ? $errors->first('usuario') : ''}}</p>-->
                    <input value="{{ old('usuario') }}" name="usuario" type="email" placeholder="Usuário" class="borda-preta">
                    
                    <!--MENSAGEM DE ERRO EM FORMATO DE LINHA UNICA: <p style="color: red">{{ $errors->has('senha') ? $errors->first('senha') : ''}}</p>-->
                    <input name="senha" type="password" placeholder="Senha" class="borda-preta">
                    <button type="submit" class="borda-preta">Acessar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection

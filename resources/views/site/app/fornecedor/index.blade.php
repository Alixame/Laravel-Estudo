<h3>FORNECEDORES</h3>

{{---------------
@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h1>Temos poucos funcionairos</h1>
@elseif(count($fornecedores) > 10)
    <h1>Temos muitos funcionarios</h1>
@else
    <h1>Não temos funcionarios</h1>
@endif
--------------}}


@isset($fornecedores)

    @forelse ( $fornecedores as $indices => $fornecedor)

        Nome: {{ $fornecedor["nome"] }}
        <br>
        CNPJ: {{ $fornecedor["cnpj"] ?? "- Vazio" }}
        <br>
        Telefone: {{ $fornecedor["ddd"] ?? "" }} {{ $fornecedor["telefone"] ?? "" }}
        
        @switch($fornecedor["ddd"])
            @case("17")
                (São José do Rio Preto - SP)
                @break
            @case("85")
                (Fortaleza - CE)
                @break
        @endswitch

        <br>       
        Status: {{ $fornecedor["status"] }}  
        
        <hr>
        
        @empty
        Não tem fornecedores cadastrados.

    @endforelse

@endisset







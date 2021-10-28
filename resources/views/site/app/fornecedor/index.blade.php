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

    Nome: {{$fornecedores[0]["nome"]}}
    
    @isset($fornecedores[0]["cnpj"])
        
        <br>CNPJ: {{$fornecedores[0]["cnpj"]}}
        @empty($fornecedores[0]["cnpj"])
            - Vazio
        @endempty

    @endisset

    <br>Status: {{$fornecedores[0]["status"]}}
   
    <hr>
    
    Nome: {{$fornecedores[1]["nome"]}}
    
    @isset($fornecedores[1]["cnpj"])
        
        <br>CNPJ: {{$fornecedores[1]["cnpj"]}}
        @empty($fornecedores[1]["cnpj"])
            - Vazio
        @endempty

    @endisset
    
    <br>Status: {{$fornecedores[1]["status"]}}


@endisset







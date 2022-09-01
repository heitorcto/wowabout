<!DOCTYPE html>
<html lang="pt-br">
    {{-- Cabeçalho --}}
    @component('layouts.cabecalho')
        
    @endcomponent

    <body class="bg-dark d-flex flex-column min-vh-100">

        {{-- Menu --}}
        @component('layouts.menu')

        @endcomponent

        {{-- Formulário --}}
        @component('layouts.formAdmin')

        @endcomponent

        @if ($erro != "")
            {{-- Mensagem de Erro --}}
            @component('layouts.erroLoginAdmin')

            @endcomponent
        @endif

        {{-- Rodapé --}}
        @component('layouts.rodape')

        @endcomponent
        
    </body>
</html>
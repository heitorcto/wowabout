<!DOCTYPE html>
<html lang="pt-br">
    {{-- Cabeçalho --}}
    @component('layouts.cabecalho')
        
    @endcomponent

    <body class="bg-dark d-flex flex-column min-vh-100">

        {{-- Menu --}}
        @component('layouts.menu')

        @endcomponent

        {{-- Controle --}}
        @component('layouts.controle')

        @endcomponent

        {{-- Rodapé --}}
        @component('layouts.rodape')

        @endcomponent

    </body>
</html>
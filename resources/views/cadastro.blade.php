<!DOCTYPE html>
<html lang="pt-br">
    {{-- Cabeçalho --}}
    @component('layouts.cabecalho')
        
    @endcomponent

    <body class="bg-dark">

        {{-- Menu --}}
        @component('layouts.menu')

        @endcomponent

        {{-- Formulário --}}
        @component('layouts.form_cadastro')

        @endcomponent

        {{-- Rodapé --}}
        @component('layouts.rodape')

        @endcomponent
    </body>
</html>
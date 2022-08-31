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
        @component('layouts.form_cadastro')

        @endcomponent

        @if ($erro != "")
        <div class="container mb-3 mt-3 d-flex justify-content-center">
            <div class="col-5 d-flex justify-content-center">
                <div class="text-bg-danger p-3 rounded-2">{{ $erro }}</div>
            </div>
        </div>
        @endif

        {{-- Rodapé --}}
        @component('layouts.rodape')

        @endcomponent
    </body>
</html>
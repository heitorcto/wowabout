{{-- Cabeçalho --}}
@component('layouts.cabecalho')
    
@endcomponent

    {{-- Menu --}}
    @component('layouts.menu')

    @endcomponent

    {{-- Formulário --}}
    @component('layouts.formAdmin')

    @endcomponent

    @isset($erro)
        {{-- Mensagem de Erro --}}
        @component('layouts.erroEmitir', ['erro' => $erro])

        @endcomponent
    @endisset()

{{-- Rodapé --}}
@component('layouts.rodape')

@endcomponent
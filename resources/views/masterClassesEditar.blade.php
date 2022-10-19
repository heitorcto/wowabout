{{-- Cabeçalho --}}
@component('layouts.cabecalho')
    
@endcomponent

    {{-- Menu --}}
    @component('layouts.menu')

    @endcomponent
    
    {{-- Título --}}
    @component('layouts.masterTitulo', ['tituloFerramenta' => $tituloFerramenta])

    @endcomponent

    {{-- Formulário --}}
    @component('layouts.formClasse', ['rota' => 'editar.classe'])

    @endcomponent

    @isset($sucesso)
        {{-- Mensagem de Sucesso --}}
        @component('layouts.sucessoEmitir', ['sucesso' => $sucesso])

        @endcomponent
    @endisset()

    @isset($erro)
        {{-- Mensagem de Erro --}}
        @component('layouts.erroEmitir', ['erro' => $erro])

        @endcomponent
    @endisset()

{{-- Rodapé --}}
@component('layouts.rodape')

@endcomponent
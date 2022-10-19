{{-- Cabeçalho --}}
@component('layouts.cabecalho')
    
@endcomponent

    {{-- Menu --}}
    @component('layouts.menu')

    @endcomponent
    
    {{-- Título --}}
    @component('layouts.masterTitulo', ['tituloFerramenta' => $tituloFerramenta])

    @endcomponent

    {{-- Botão de Cadastro --}}
    <div class="container mt-3 mb-3">
        <div class="d-flex justify-content-center">
            <a href="{{ route("master.classes.cadastrar") }}" class="btn btn-light">
                Cadastrar nova classe
            </a>
        </div>
    </div>

    {{-- Tabela --}}
    <div class="container mt-5 rounded-3 shadow">
        <table class="table text-white">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cor</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>

                @foreach($classes as $key => $classe)    
                    <tr>
                        <th>{{ $classe->id }}</th>
                        <td>{{ $classe->nome }}</td>
                        <td><span class="fs-4 p-1" style="color: {{ $classe->cor }};"><i class="bi bi-bookmark-fill"></i></span></td>
                        <td>
                            <a href="{{ route('editar.classe')  . "/" . $classe->id }}" class="fs-4 p-1 text-primary">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="{{ route('deletar.classe')  . "/" . $classe->id }}" class="fs-4 p-1 text-danger">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

{{-- Rodapé --}}
@component('layouts.rodape')

@endcomponent
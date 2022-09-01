<!DOCTYPE html>
<html lang="pt-br">
    {{-- Cabeçalho --}}
    @component('layouts.cabecalho')
        
    @endcomponent

    <body class="bg-dark d-flex flex-column min-vh-100">

        {{-- Menu --}}
        @component('layouts.menu')

        @endcomponent
        
        {{-- Título --}}
        @component('layouts.masterTitulo', ['tituloFerramenta' => $tituloFerramenta])

        @endcomponent

        {{-- Botão de Cadastro --}}
        <div class="container mt-3 mb-3">
            <div class="d-flex justify-content-center">
                <a href="" class="btn btn-light">
                    Cadastrar nova classe
                </a>
            </div>
        </div>

        {{-- tabela --}}
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
                    <tr>
                        <th>1</th>
                        <td>Paladino</td>
                        <td>Rosa</td>
                        <td>
                            <a href="" class="fs-4 p-1 text-primary">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="" class="fs-4 p-1 text-danger">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- Rodapé --}}
        @component('layouts.rodape')

        @endcomponent

    </body>
</html>
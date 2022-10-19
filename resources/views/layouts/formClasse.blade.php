<div class="container rounded-3 shadow mb-5">
    <form class="p-5" action="{{ route("efetuar.cadastro.classe") }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="d-flex justify-content-center">
            <div class="col-6 mb-4">
                <label for="nome" class="form-label text-white">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control">
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-6 mb-4">
                <label for="cor" class="form-label text-white">Cor:</label>
                <input type="color" id="cor" name="cor" class="form-control form-control-color">
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-6 mb-4">
                <label for="imagem" class="form-label text-white">Imagem:</label>
                <input type="file" id="imagem" name="imagem" class="form-control">
            </div>
        </div>
        <div class="d-flex justify-content-center mt-2">
            <input type="submit" value="Cadastrar" class="btn btn-success">
        </div>
    </form>
</div>
<form action="cadastros" method="POST">
    @csrf
    <div class="container py-3">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-5">
                <div class="card shadow-2-strong rounded-4">
                    <div class="card-body p-5 text-center">
                        <div class="mb-5 fs-2">
                            <i class="bi bi-box"></i> WoW About
                        </div>
            
                        <div class="form-outline mb-4">
                            <input type="text" name="nome" class="shadow form-control form-control-lg" placeholder="Nome">
                        </div>

                        <div class="form-outline mb-4">
                            <input type="email" name="email" class="shadow form-control form-control-lg" placeholder="E-mail">
                        </div>
            
                        <div class="form-outline mb-4">
                            <input type="password" name="senha" class="shadow form-control form-control-lg" placeholder="Senha">
                        </div>

                        <button type="submit" class="col-5 btn btn-dark btn-lg btn-block shadow">Cadastrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
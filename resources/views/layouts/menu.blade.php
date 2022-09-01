<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container mr-5 ">
        <span class="navbar-brand" href="#"><i class="bi bi-box"></i> WoW About</span>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="ml-auto" id="navbarNav">
            <ul class="navbar-nav">
                @if (session()->has('nome'))
                    <li class="nav-item">
                        <span class="nav-link active" aria-current="page">Olá, {{ session()->get('nome') }}</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/master/sair">Sair <i class="bi bi-arrow-bar-right"></i></a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link inative" aria-current="page" href="#">Classe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Classe</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
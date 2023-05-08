<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container">
        <a class="navbar-brand" href="#">Traceability System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('master.detail-produk.index') }}">Detail Produk</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('master.produk.index') }}">Produk</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

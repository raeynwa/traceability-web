<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
    <div class="container">
        <a class="navbar-brand" href="{{ route('detail-produk.index') }}">Traceability System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('detail-produk.index') }}">Detail Produk</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('master.produk.index') }}">Produk</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('master.user.index') }}">User</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <a class="btn btn-outline-secondary" href="{{ route('auth.logout.store') }}">Logout</a>
            </form>
        </div>
    </div>
</nav>

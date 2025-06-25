<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <!-- Brand dengan Dropdown -->
        <div class="dropdown">
            <a class="navbar-brand dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                HIMA
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="">HIMA Teknik Informatika</a></li>
                <li><a class="dropdown-item" href="">HIMA Sistem Informasi</a></li>
                <li><a class="dropdown-item" href="">HIMA Teknik Komputer</a></li>
                <li><a class="dropdown-item" href="">HIMA Manajemen</a></li>
                <li><a class="dropdown-item" href="">HIMA Akuntansi</a></li>
                <li><a class="dropdown-item" href="">HIMA Ekonomi</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="">Semua HIMA</a></li>
            </ul>
            {{-- <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('hima.informatika') }}">HIMA Teknik Informatika</a></li>
                <li><a class="dropdown-item" href="{{ route('hima.sistem-informasi') }}">HIMA Sistem Informasi</a></li>
                <li><a class="dropdown-item" href="{{ route('hima.teknik-komputer') }}">HIMA Teknik Komputer</a></li>
                <li><a class="dropdown-item" href="{{ route('hima.manajemen') }}">HIMA Manajemen</a></li>
                <li><a class="dropdown-item" href="{{ route('hima.akuntansi') }}">HIMA Akuntansi</a></li>
                <li><a class="dropdown-item" href="{{ route('hima.ekonomi') }}">HIMA Ekonomi</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('hima.semua') }}">Semua HIMA</a></li>
            </ul> --}}
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/kegiatan') }}">Kegiatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Struktur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Berita</a>
                </li>
            </ul>
            <div>
                {{-- <a href="#" class="btn btn-outline-primary me-2">Daftar</a> --}}
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            </div>
        </div>
    </div>
</nav>

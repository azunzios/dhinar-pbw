<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BPS Provinsi Bengkulu')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .navbar-bps { background-color: #04507f; }
        .navbar-bps .navbar-brand { font-weight: 700; letter-spacing: .5px; }
        .navbar-bps .nav-link { color: #fff; padding: 1.15rem 1.25rem; border-radius: 0; }
        .navbar-bps .nav-link:hover { background-color: rgba(255,255,255,.15); }
        .navbar-bps .nav-link.active { background-color: #cfcfcf; color: #222; }

        .table-bps thead th { background-color: #04507f; color: #fff; }
        .table-bps tbody tr { background-color: #f2f2f2; }
        .table-bps td, .table-bps th { vertical-align: middle; }
        .btn-icon { font-size: 1.2rem; color: #000; padding: 0 .35rem; }
        .btn-icon:hover { color: #04507f; }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-bps py-0">
        <div class="container-fluid px-4">
            <a class="navbar-brand d-flex align-items-center gap-2" href="/publikasi">
                <img src="/images/logo bps.png" alt="Logo BPS" height="40"
                     onerror="this.style.display='none'">
                BPS PROVINSI DI YOGYAKARTA
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#menuUtama" aria-controls="menuUtama"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menuUtama">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('publikasi') ? 'active' : '' }}"
                           href="/publikasi">Daftar Publikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('publikasi/create') ? 'active' : '' }}"
                           href="/publikasi/create">Tambah Publikasi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-4">
        @yield('content')
    </main>
</body>
</html>
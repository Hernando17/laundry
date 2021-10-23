<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Laundry</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('index') }}">Beranda</a>
                    </li>
                    @can('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('outletadmin') }}">Outlet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('outletadmin') }}">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('outletadmin') }}">Pengguna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('outletadmin') }}">Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('outletadmin') }}">Laporan</a>
                        </li>
                    @endcan
                </ul>
                <ul class="navbar-nav ms-auto">
                    @can('kasir')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('indexkasir') }}">Kasir</a>
                        </li>
                    @endcan
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                        <li class="nav-item nav-link">
                            {{ Auth::user()->username }}
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
</body>

<footer>
    <script href="{{ asset('assets') }}/js/bootstrap.min.js"></script>
</footer>

</html>

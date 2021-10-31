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
            <a class="navbar-brand" href="{{ route('index') }}">Laundry</a>
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
                            <a class="nav-link" href="{{ route('produkadmin') }}">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('penggunaadmin') }}">Pengguna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('transaksiadmin') }}">Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('laporanadmin') }}">Laporan</a>
                        </li>
                    @endcan
                    @can('kasir')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('transaksikasir') }}">Transaksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('laporankasir') }}">Laporan</a>
                        </li>
                    @endcan
                </ul>
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                        </li>
                        <li class="nav-item nav-link">
                            {{ Auth::user()->username }}
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Masuk</a>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</footer>

</html>

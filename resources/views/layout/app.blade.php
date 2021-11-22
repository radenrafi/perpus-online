<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('title','Perpustakaan Lab UM')</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('/css/allStyle.css') }}">
</head>
<body class="warna">
    <div class="upperBar">
    </div>
    <nav class="navbar navbar-expand-lg navbar-light navatas">
        <div class="container">
            <a class="navbar-brand" href="/">
                <div class="row">
                    <div class="col-2">
                        <img src="{{ asset('/asset/logoSekolah.png') }}"alt="" width="55" height="auto" class="d-inline-block align-text-center">
                        &nbsp;
                    </div>
                    <div class="col">
                        <div class="row">
                            <h5 class="headerTopNav"><b>Perpustakaan Digital</b></h5>
                        </div>
                        <div class="row">
                            <p class="headerBottomNav"> SMP Laboratorium UM</p>
                        </div>
                    </div>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">
                            &nbsp; <svg xmlns="http://www.w3.org/2000/svg" width="32" height="auto" fill="#FFED79" class="bi bi-house-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary navButton " aria-current="page" href="{{ route('buku.index') }}">Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary navButton " aria-current="page" href="{{ route('materi.index') }}">Bahan Ajar</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="btn btn-primary navButton" href="{{ route('koleksi') }}">Koleksi</a>
                    </li> --}}
                    @can('create', App\Models\Buku::class)
                    <li class="nav-item dropdown">
                        <a class="btn btn-primary navButton dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Tambah Koleksi
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('buku.create') }}">Tambah Buku</a></li>
                            <li><a class="dropdown-item" href="{{ route('materi.create') }}">Tambah Materi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary navButton" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    @endcan
                </ul>
            </div>
        </div>
    </nav>
    {{--  awal konten  --}}
    <main>
        @yield('content')
    </main>
    {{--  akhir konten  --}}
    <div class="bottomBar">
    </div>
</body>
</html>

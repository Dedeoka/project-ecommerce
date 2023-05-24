<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.css"
    rel="stylesheet"
    />

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link href="https://fonts.cdnfonts.com/css/asap" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/user.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.3.0/mdb.min.js"
    ></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <img class="logo-putubagus" src="{{ asset('img/logo_putubagus.png') }}" alt="">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Putu<span>Bagus</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto px-5">
                        <li class="nav-item px-3">
                            <a class="nav-link fw-bold" href="/home">Home</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link fw-bold" href="#">Kategori</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link fw-bold" href="/product">Produk</a>
                        </li>
                        <li class="nav-item px-3">
                            <a class="nav-link fw-bold" href="{{ url('cart') }}">Keranjang</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                            <div class="input-group rounded">
                            <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                            </div>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
            <!-- Remove the container if you want to extend the Footer to full width. -->
            <div class="footer-container">

                <footer class="text-white text-center text-lg-start" style="background-color: #B1866E;">
                    <!-- Grid container -->
                    <div class="container p-4">
                    <!--Grid row-->
                    <div class="row mt-4">
                        <!--Grid column-->
                        <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                        <div class="logo-item">
                            <img src="{{ asset('img/mini-logo.png') }}" alt="">
                            <h2 class="logo-brand">
                                Putu<span>Bagus</span>
                            </h2>
                        </div>
                        <div class="mt-4 sosmed-container" style="background-color: white;">
                            <div class="sosmed-icon">
                                <a class="btn btn-primary" style="background-color: #3b5998;" href="#!" role="button">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </div>
                            <div class="sosmed-icon">
                                <a class="btn btn-primary" style="background-color: #ac2bac;" href="#!" role="button">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </div>
                            <div class="sosmed-icon">
                                <a class="btn btn-primary" style="background-color: #25d366;" href="#!" role="button">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                        </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                            <ul class="fa-ul" style="margin-left: 1.65em;">
                                <h5 class="text-uppercase mb-2 pb-1">Tentang Putu Bagus</h5>
                                <li class="mb-3">
                                <p class="ms-0">Tentang Kami</p>
                                </li>
                                <li class="mb-3">
                                <p class="ms-0">FAQ</p>
                                </li>
                                <li class="mb-3">
                                <p class="ms-0">Kemitraan</p>
                                </li>
                            </ul>
                            </div>
                        <!--Grid column-->

                        <!--Grid column-->
                        <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                            <ul class="fa-ul" style="margin-left: 1.65em;">
                                <h5 class="text-uppercase mb-2 pb-1">Kontak</h5>
                                <li class="mb-3">
                                <p class="ms-0">Hubungi Kami</p>
                                </li>
                                <li class="mb-3">
                                <p class="ms-0">Sosial Media</p>
                                </li>
                                <li class="mb-3">
                                <p class="ms-0">Alamat</p>
                                </li>
                            </ul>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                    </div>
                    <!-- Grid container -->

                    <!-- Copyright -->
                    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2020 Copyright:
                    <a class="text-white" href="#">Putu Bagus</a>
                    </div>
                    <!-- Copyright -->
                </footer>

            </div>
    <!-- End of .container -->
    </div>
    <script>
        const myCarousel = document.querySelector('#myCarousel');
        const carousel = new mdb.Carousel(myCarousel);
    </script>
</body>
</html>

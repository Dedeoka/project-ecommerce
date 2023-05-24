@extends('layouts.user.layout')
@section('content')
<div class="main">
    <div class="container title-container" id="title">
        <h1>Ayo Dukung UMKM Lokal Panjer!</h1>
        <p>kalian bisa coba berbagai pilihan produk dari UMKM </br> lokal di Panjer yaitu Putu Bagus, dengan kemudahan </br> teknologi berbelanja secara digital!</p>
        <div class="title-btn">
            <a href="" class="belanja-btn">Belanja Sekarang!</a>
        </div>
    </div>

    <div class="kategori-container" id="kategori">
        <div class="decoration-content">
            <h1 hidden>test</h1>
        </div>
         <div class="kateori-content">
            <div class="w-25 p-3 kategori-title">
                <h1>Kategori</h1>
            </div>
            <div class="d-flex justify-content-center">
                <div class="p-5 bd-highlight kategori-item">
                    <img src="{{ asset('img/kategori-beras.png') }}" alt="" style="width: 175px; height: 150px;">
                    <div class="text-center pt-3">
                        <h5 class="kategori-name">BERAS</h5>
                    </div>
                    <p style="width: 175px" class="text-center">Beras yang tersedia di UMKM Putu Bagus ini tentu saja produk beras yang berkualitas</p>
                </div>
                <div class="p-5 bd-highlight kategori-item">
                    <img src="{{ asset('img/kategori-beras.png') }}" alt="" style="width: 175px; height: 150px;">
                    <div class="text-center pt-3">
                        <h5 class="kategori-name">TELUR</h5>
                    </div>
                    <p style="width: 175px" class="text-center">Selain jenis telur yang lengkap di UMKM Putu Bagus juga menyediakan produk yang berkualitas</p>
                </div>
                <div class="p-5 bd-highlight kategori-item">
                    <img src="{{ asset('img/kategori-beras.png') }}" alt="" style="width: 175px; height: 150px;">
                    <div class="text-center pt-3">
                        <h5 class="kategori-name">MINYAK</h5>
                    </div>
                    <p style="width: 175px" class="text-center">Minyak yang tersedia di UMKM Putu Bagus memiliki varian yang beragam, selain itu tentu saja memiliki kualitas yang tinggi</p>
                </div>
                <div class="p-5 bd-highlight kategori-item">
                    <img src="{{ asset('img/kategori-beras.png') }}" alt="" style="width: 175px; height: 150px;">
                    <div class="text-center pt-3">
                        <h5 class="kategori-name">BUMBU</h5>
                    </div>
                    <p style="width: 175px" class="text-center">UMKM Putu Bagus memiliki beragam bumbu masakan yang lengkap dan berkualitas tinggi</p>
                </div>
            </div>
         </div>
    </div>

    <div class="container produk-container" id="produk">
        <h1>Produk UMKM</h1>
        <p>Berikut merupakan produk teratas yang ada di UMKM Putu Bagus, </br> untuk memudahkan kalian menemukan produk yang banyak digemari!</p>
        <div class="produk-btn">
            <a href="" class="lihat-btn">Lihat Produk</a>
        </div>
    </div>

    <div class="container">
        <!-- Carousel wrapper -->
        <div id="carouselBasicExample" class="carousel slide carousel-fade" data-mdb-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-mdb-target="#carouselBasicExample" data-mdb-slide-to="0" class="active"></li>
            <li data-mdb-target="#carouselBasicExample" data-mdb-slide-to="1"></li>
            <li data-mdb-target="#carouselBasicExample" data-mdb-slide-to="2"></li>
        </ol>

        <!-- Inner -->
        <div class="carousel-inner slider-image">
            <!-- Single item -->
            <div class="carousel-item active">
            <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(23).webp" class="d-block w-100" alt="..."/>
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item">
            <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(23).webp" class="d-block w-100" alt="..."/>
            <div class="carousel-caption d-none d-md-block">
                <h5>Second slide label</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            </div>

            <!-- Single item -->
            <div class="carousel-item">
            <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(23).webp" class="d-block w-100" alt="..."/>
            <div class="carousel-caption d-none d-md-block">
                <h5>Third slide label</h5>
                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
            </div>
        </div>
        <!-- Inner -->

        <!-- Controls -->
        <a class="carousel-control-prev" href="#carouselBasicExample" role="button" data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselBasicExample" role="button" data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
        </div>
        <!-- Carousel wrapper -->
    </div>
</div>
@endsection

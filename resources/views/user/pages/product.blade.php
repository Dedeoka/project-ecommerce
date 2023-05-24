@extends('layouts.user.layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 pt-5">
			<h2>Produk <b>Terlaris</b></h2>
			<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="0">
			<!-- Carousel indicators -->
			<!-- Wrapper for carousel items -->
			<div class="carousel-inner">
				<div class="carousel-item active">
					<div class="row">
                        @foreach ( $products as $product )
						<div class="col-sm-3">
							<div class="thumb-wrapper">
								<div class="img-box">
									<img src="{{ asset('img/kategori-beras.png') }}" class="img-fluid" alt="">
								</div>
								<div class="thumb-content">
									<h4>{{ $product->product_name }}</h4>
									<p class="item-price"><span>Rp {{ $product->price }}</span></p>
									<div class="star-rating">
										<ul class="list-inline">
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
										</ul>
									</div>
                                    <form method="POST" id="cart{{$product->id}}" action="{{ url('cart/'.$product->id) }}">
                                    @csrf
                                    </form>
									<a href="#" class="btn btn-primary">Beli</a>
									<a onclick="document.getElementById('cart{{$product->id}}').submit()" class="btn btn-primary">+ Keranjang</a>
								</div>
							</div>
						</div>
                        @endforeach
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>

@endsection

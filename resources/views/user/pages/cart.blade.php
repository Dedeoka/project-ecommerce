@extends('layouts.user.layout')
@section('content')
<div class="cart-container">
    <div class="container">
        <div class="table-container">
            <table class="table table-cart table-borderless">
                <thead class="thead-cart">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $cart as $item )
                    <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <th><img src="{{ asset('img/kategori-bumbu.png') }}" style="width:100px; height:100px;" alt=""></th>
                    <td>{{$item->product->product_name}}</td>
                    <td>Rp. {{$item->product->price}}</td>
                    <td>{{$item->qty}}</td>
                    <td>Rp. {{number_format($item->product->price * $item->qty)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="col-lg-3 offset-lg-9">
                    <div class="cart-total">
                        <div class="row">
                            <div class="col pr-0">
                            <h6>Total Harga</h6>
                            </div>
                            <div class="col pl-0">
                            <h6>Rp. {{number_format($total)}}</h6>
                            </div>
                        @php
                            $carts = [];
                            if(count($cart)>0){

                                foreach($cart as $item){
                                    array_push($carts,$item->id);
                                }
                            }
                        @endphp
                        </div>
                    </div>
                    <div class="checkout-container pr-5">
                        <form action="#" method="POST">
                            @csrf
                            <input name="items" type="text" value="{{join(",",$carts)}}" hidden>
                            <button type="submit"  class="checkout-btn pr-3 pl-3">Checkout </button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection

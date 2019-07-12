
@extends('layout')

@section('content')

    <h1>Landing page</h1>

    <div class="grid container">
        @foreach($products as $product)
            <div class="product">
                <a href="/single-product/{{$product->id}}">
                    <img src="https://ssl-product-images.www8-hp.com/digmedialib/prodimg/lowres/c05962448.png" alt="">
                    <div>
                        <h2>{{$product->name}}</h2>
                        <p>{{$product->SKU}}</p>
                        <p>{{$product->price}}</p>
                    </div>

                </a>

            </div>
        @endforeach

    </div>



@endsection

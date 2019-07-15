
@extends('layouts.app')

@section('content')

    <h1>Landing page</h1>

    <div class="grid container">
        @foreach($products as $product)
            <div class="product">
                <a href="/single-product/{{$product->id}}">
                    <img src="{{ asset('images/'.$product->image) }}">
                    <div>
                        <h2>{{$product->name}}</h2>

                        <p>{{$product->SKU}}</p>
                        <p>{{$product->price}}€</p>
                        <p>
                            @for($star = 1; $star <=5; $star++)
                                @if($product->rating >= $star)
                                    <span><i class="fas fa-star"></i></span>
                                @else
                                    <span><i class="far fa-star"></i></span>
                                @endif
                            @endfor
                        </p>
                    </div>

                </a>

            </div>
        @endforeach

    </div>



@endsection


@extends('layouts.app')

@section('content')

    <h1>Product catalog</h1>
    @if($products->count())
        <div class="grid container">
            @foreach($products as $product)
                <div class="product">
                    <a href="/single-product/{{$product->id}}">
                        <img src="{{ asset('images/'.$product->image) }}">
                        <div>
                            <h2>{{$product->name}}</h2>
                            <p>{{$product->SKU}}</p>

                            @if($product->special_price || $product->globalDiscountValue())
                                <p class="line_through">{{number_format($product->priceWithTax(), 2)}}€</p>
                                <p>{{$product->finalPrice()}}€</p>
                            @else
                                <p>{{$product->finalPrice()}}€</p>
                            @endif

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
        <div>
            {!! $products->links() !!}
        </div>
    @else
        <h2>Produktu nėra</h2>
    @endif



@endsection

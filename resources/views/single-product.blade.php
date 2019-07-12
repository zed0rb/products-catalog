@extends('layout')

@section('content')


    <div class="container">
        <div class="product single-product">
            <img src="{{ asset('images/'.$product->image) }}">
            <h1>{{$product->name}}</h1>
            <p>{{$product->SKU}}</p>
            <p>{{$product->price}}€</p>
            <p>{!! $product->description !!}</p>
            <a href="/" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i> Back</a>
        </div>
    </div>
@endsection

@extends('layout')

@section('content')



    <h1>{{$product->name}}</h1>

    <li>{{$product->price}}</li>
    <li>{{$product->description}}</li>

    <p><a href="/products/{{$product->id}}/edit">Edit</a></p>

@endsection

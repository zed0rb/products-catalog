@extends('layouts.app')

@section('content')


    <div class="container">
        <h1>Products</h1>
        <a href="/products/create" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i>&nbsp; Add new product</a>
        <form method="post">
            @method('DELETE')
            @csrf
            <button formaction="/deleteall" type="submit" class="btn btn-danger">Delete All Selected</button>

            <table id="datatable" class="table table-striped table-hover text-center" cellspacing="0" width="100%">
                <thead class="thead-dark">
                <tr>
                    <th>Select</th>
                    <th>Product name</th>
                    <th>Unique number</th>
                    <th>Price in €</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Edit / Delete</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td><input type="checkbox" name="ids[]" class="selectbox" value="{{$product->id}}"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{$product->SKU}}</td>
                            <td>{{$product->price}}€</td>
                            <td>{!! $product->description !!}</td>
                            <td><img src="{{ asset('images/'.$product->image) }}"></td>
                            <td>{{$product->status}}</td>
                            <td>
                                <a href="/products/{{$product->id}}/edit" class='btn btn-warning btn-lg tableButton'><span><i class="fas fa-edit"></i></span></a>
                                /
                                <button formaction="/products/{{$product->id}}" name="delete"  id="delete" type='submit' class='btn btn-danger btn-lg tableButton'><span><i class="fas fa-trash-alt"></i></span></button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>


@endsection



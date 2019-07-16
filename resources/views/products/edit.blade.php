@extends('layouts.app')

@section('content')

    <h1>Edit product</h1>

    <form method="post" action="/products/{{$product->id}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <table class="table table-bordered">
            <tr>
                <td>Product name</td>
                <td><input type="text" name="name" placeholder="product name" class="form-control" value="{{$product->name}}" required></td>
            </tr>
            <tr>
                <td>Unique number</td>
                <td><input type="text" name="SKU" placeholder="unique number" class="form-control" value="{{$product->SKU}}" required></td>
            </tr>
            <tr>
                <td>Price in €</td>
                <td><input type="number" step="0.01" name="price" placeholder="price" class="form-control" value="{{$product->price}}" required></td>
            </tr>
            <tr>
                <td>Individual discount (€)</td>
                <td><input type="number" step="0.01" name="special_price" placeholder="individual discount" class="form-control" value="{{$product->special_price}}"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea  name="description" placeholder="description" class="form-control myTextEditor" required>{{$product->description}}</textarea></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status" id="status">
                        <option value="active" @if ($product->status == "active") {{ 'selected' }} @endif>Active</option>
                        <option value="disabled" @if ($product->status == "disabled") {{ 'selected' }} @endif>Disabled</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Update product</button>
                    <a href="/products" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i> Back</a>

                </td>
            </tr>
        </table>
    </form>

    <form  method="post" action="/products/{{$product->id}}">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger" type="submit">Delete product</button>
    </form>

@endsection

@extends('layouts.app')

@section('content')

<h1>Sukurti nauja preke</h1>

    <form method="post" action="/products" enctype="multipart/form-data">
        @csrf


        <table class="table table-bordered">
            <tr>
                <td>Product name</td>
                <td><input type="text" name="name" placeholder="product name" class="form-control" value="{{old('name')}}" required></td>
            </tr>
            <tr>
                <td>Unique number</td>
                <td><input type="text" name="SKU" placeholder="unique number" class="form-control" value="{{old('SKU')}}" required></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="number" step="0.01" name="price" placeholder="price" class="form-control" value="{{old('price')}}" required></td>
            </tr>
            <tr>
                <td>Individual discount (€)</td>
                <td><input type="number" step="0.01" name="special_price" placeholder="individual discount" class="form-control" value="{{old('special_price')}}"></td>
            </tr>
            <tr>
                <td>Description</td>
                <td><textarea class="myTextEditor" name="description"  novalidate>{{old('description')}}</textarea></td>
            </tr>
            <tr>
                <td>Image</td>
                <td><input type="file" name="image" class="form-control" value="Upload image"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="status" id="status">
                        <option value="active">Active</option>
                        <option value="disabled">Disabled</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Create new Records</button>
                    <a href="/products" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i> Back</a>
                </td>
            </tr>
        </table>
    </form>


    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="container">
    <form method="post">

    </form>
</div>

@endsection
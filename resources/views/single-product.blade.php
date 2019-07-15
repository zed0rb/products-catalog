@extends('layouts.app')

@section('content')



        <div class="product single-product">
            <img src="{{ asset('images/'.$product->image) }}">
            <h1>{{$product->name}}</h1>
            <p>{{$product->SKU}}</p>
            <p>{{$product->price}}€</p>
            <p>{!! $product->description !!}</p>
            <p>
                @for($star = 1; $star <=5; $star++)
                    @if($product->rating >= $star)
                        <span><i class="fas fa-star"></i></span>
                    @else
                        <span><i class="far fa-star"></i></span>
                    @endif
                @endfor
            </p>
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalExample">
                Write a review
            </button><br><br>
            <a href="/" class="btn btn-success"><i class="glyphicon glyphicon-backward"></i> Back</a>
        </div>

{{--        modal review form--}}
        <div id="ModalExample" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Make a review</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="/single-product/{{$product->id}}/review">
                            @csrf
                            <table class="table table-bordered">
                                <tr>
                                    <td>Rate It</td>
                                    <td>
                                        <select name="rating" id="rating">
                                            <option value=5>5</option>
                                            <option value=4>4</option>
                                            <option value=3>3</option>
                                            <option value=2>2</option>
                                            <option value=1>1</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Head Line</td>
                                    <td><input type="text" name="headline" class="form-control" required></td>
                                </tr>

                                <tr>
                                    <td>More about product</td>
                                    <td><textarea  name="description" >{{old('description')}}</textarea></td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" name="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> make a review</button>
                                    </td>
                                </tr>

                            </table>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


{{--    review section--}}
        <div class="main-review-container">
            <h2>Reviews</h2>
            @foreach($product->reviews as $review)

                <div class="review-container">
                    <h3>{{$review->headline}}</h3>
                    <p>{{$review->description}}</p>
                </div>

            @endforeach
        </div>


@endsection

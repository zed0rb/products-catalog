<?php

namespace App\Http\Controllers;

use App\Product;



class ProductReviewController extends Controller
{

    public function store(Product $product)
    {
        $attributes = request()->validate([
            'rating'        => 'required',
            'headline'      => 'min:3',
            'description'   => 'min:10'
        ]);

        $product->addReview($attributes);

        return back();
    }

}

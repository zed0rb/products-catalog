<?php

namespace App\Http\Controllers;

use App\Product;
use Mews\Purifier\Facades\Purifier;


class ProductReviewController extends Controller
{

    public function store(Product $product)
    {
         request()->validate([
            'rating'        => 'required',
            'headline'      => 'min:3',
            'description'   => 'min:10'
        ]);

         $form_data = [
             'rating' => request('rating'),
             'headline' => request('headline'),
             'description' => Purifier::clean(request('description'))
         ];

        $product->addReview($form_data);

        return back();
    }

}

<?php

namespace App\Http\Controllers;

use App\Product;



class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $products = Product::latest()->where('status', 'active')->paginate(8);
        return view('welcome', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 8);
    }



    public function show(Product $product)
    {
        return view('single-product', compact('product'));
    }

}

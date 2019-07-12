<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Product $product)
    {
        $product->create(
            request()->validate([
                'name'=> ['required', 'min:3', 'max:191'],
                'SKU' => 'required',
                'price' => 'required',
                'description' => 'required'

        ]));

        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

        return view('/products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product)
    {
        $product->update(request([
            'name',
            'SKU',
            'status',
            'price',
            'status',
            'description']));

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     *
     */
    public function destroy(Product $product)
    {

        $product->delete();

        return redirect('/products');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->get('ids');
        DB::delete('delete from products where id in ('.implode(",",$ids).')');
        return redirect('/products');
    }
}
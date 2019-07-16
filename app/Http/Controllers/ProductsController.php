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
        return view('/products.create');
    }


    /**
     * Store a newly created resource in storage.
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Product $product)
    {
        request()->validate([
                'name'        => 'required|min:3|max:191',
                'SKU'         => 'required',
                'price'       => 'required',
                'description' => 'required',
                'image'       => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $originalFileName = '';
        if (request()->hasFile('image')){
            $img = request()->file('image');

            $originalFileName = $img->getClientOriginalName();
            $img->move('images', $originalFileName);
        }

        $form_data = [
            'name'        => request('name'),
            'SKU'         => request('SKU'),
            'price'       => request('price'),
            'description' => request('description'),
            'image'       => $originalFileName,
            'status'      => request('status'),
            'special_price' => request('special_price'),
            'rates_id'      => 1
        ];
        $product->create($form_data);

        return redirect('products');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product)
    {
        request()->validate([
            'name'        => ['required', 'min:3', 'max:191'],
            'SKU'         => 'required',
            'price'       => 'required',
            'description' => 'required',
            'image'       => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

//        check if image is set and prepare data
        if (request()->hasFile('image')){
            $img = request()->file('image');

            $originalFileName = $img->getClientOriginalName();
            $img->move('images', $originalFileName);

            $form_data = [
                'name'        => request('name'),
                'SKU'         => request('SKU'),
                'price'       => request('price'),
                'description' => request('description'),
                'image'       => $originalFileName,
                'status'      => request('status'),
                'special_price' => request('special_price')
            ];
        } else {
            $form_data = [
                'name'        => request('name'),
                'SKU'         => request('SKU'),
                'price'       => request('price'),
                'description' => request('description'),
                'status'      => request('status'),
                'special_price' => request('special_price')
            ];
        }
        $product->update($form_data);

        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
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

<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'random',
            'SKU' => 'random',
            'price' => 125.45,
            'description' => 'lorem impsum'
        ]);
    }
}

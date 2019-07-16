<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Rate extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

//    public function changeTax()
//    {
//       $a = Rate::where('id', 1)->get();
//
//        $a[0]->attributes['tax']
//            ? Rate::where('id', 1)->update(['tax' => 0])
//            : Rate::where('id', 1)->update(['tax' => 21]);
//
//        $tax = $a[0]->attributes['tax'];
//
//       return $tax;
//    }

}

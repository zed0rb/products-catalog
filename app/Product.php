<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Product extends Model
{

    protected $guarded = [];


    public function reviews(){
        return $this->hasMany(ProductReview::class);
    }

    public function addReview($review)
    {
        $this->reviews()->create($review);
    }

    public function getRatingAttribute()
    {
        return number_format(DB::table('product_reviews')->where('product_id', $this->attributes['id'])->average('rating'));
    }

}

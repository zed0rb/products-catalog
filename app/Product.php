<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Product extends Model
{

    protected $guarded = [];


    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function addReview($review)
    {
        $this->reviews()->create($review);
    }

    public function getRatingAttribute()
    {
        return number_format($this->reviews()
            ->where('product_id', $this->attributes['id'])
            ->average('rating'));
    }

    public function rates()
    {
        return $this->belongsTo(Rate::class);
    }

    public function globalDiscountValue()
    {
        return $this->rates()->where('id', $this->attributes['rates_id'])->value('global_discount');
    }

    public function priceWithTax()
    {
        $tax = $this->rates()->where('id', $this->attributes['rates_id'])->value('tax');
        $price = $this->attributes['price'];
        $priceWithTax = $price + $price * $tax / 100;

        return $priceWithTax;
    }

    public function finalPrice()
    {
        $globalDiscount = $this->globalDiscountValue();
        $specialDiscount = $this->attributes['special_price'];

        $finalPrice = $specialDiscount
            ? $this->priceWithTax() - $specialDiscount
            : $this->priceWithTax() - ($this->priceWithTax() * $globalDiscount / 100);

        return number_format($finalPrice, 2);
    }
}

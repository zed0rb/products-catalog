<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
        protected $fillable = [
        'product_id', 'headline', 'description', 'rating'
        ];

        public function product()
        {
            return $this->belongsTo(Product::class);
        }

}

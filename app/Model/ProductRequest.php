<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model
{
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}

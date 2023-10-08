<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model

{
    //
    protected $guarded = ['id'];
        
        public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id', 'id');
    }

    public function dataentryproduct(){
        return $this->belongsTo(DataentryProduct::class, 'dataentry_product_id','id');
    }
}


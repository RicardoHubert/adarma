<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transactional extends Model
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

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function payment_terms()
    {
        return $this->belongsTo(DataEntryPaymentTerms::class,'payment_terms_id','id');
    }
}

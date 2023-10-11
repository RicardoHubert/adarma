<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model

{
    //
    protected $guarded = ['id'];
    
    public function transactional()
    {
        return $this->hasOne(Transactional::class);
    }
}


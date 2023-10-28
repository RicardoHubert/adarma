<?php

namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\IndonesiaProvinceSeeder;

class IndonesiaProvince extends Model
{
    //
    // use HasFactory;

    protected $fillable = ['name'];
    protected $factory = IndonesiaProvinceSeeder::class;
}

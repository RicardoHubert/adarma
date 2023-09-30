<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id', 'id');
    }

    public function getPdfDownloadLinkAttribute()
    {
        $pdfFileName = $this->attributes['product_pdf'];
        
        if (!$pdfFileName) {
            return ''; // Handle the case when product_pdf is NULL
        }
    
        return route('download_product.pdf', ['product_pdfs' => $pdfFileName]);
    }
    
}
?>
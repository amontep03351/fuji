<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPdf extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'pdf_url'];
    
    public function product()
    {
        return $this->belongsTo(Product::class); // ถ้าเป็น one-to-many
    }
    
}

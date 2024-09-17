<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'product_category';
    
    protected $fillable = [ 
        'display_order', 'status'
    ];
 
    /**
     * Get the translations for the product category.
     */
    public function translations()
    {
        return $this->hasMany(ProductCategoryTranslation::class, 'product_category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [
        'name_en',
        'name_jp',
        'description_en',
        'description_jp',
        'display_order',
        'service_image',
        'status',
    ];

    public function images()
    {
        return $this->hasMany(ServiceImage::class, 'service_id');
    }
 
    public function relatedServices()
    {
        return $this->hasMany(RelatedService::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;
    protected $table = 'systems';
    protected $fillable = [
        'name_en',
        'name_jp',
        'description_en',
        'description_jp',
        'display_order',
        'system_image',
        'status',
    ];

    public function images()
    {
        return $this->hasMany(SystemImage::class, 'system_id');
    }
}
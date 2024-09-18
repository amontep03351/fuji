<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageSlider extends Model
{
    use HasFactory;
    protected $table = 'image_sliders';

    protected $fillable = [ 
        'title_en',
        'title_jp',
        'description_en',
        'description_jp',
        'image_url',
        'display_order',
        'status'
    ];
}

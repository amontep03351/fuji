<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class System extends Model
{
    use HasFactory;
    protected $table = 'systems';
    protected $fillable = [
        'title_en',
        'title_jp',
        'image_url',
        'status',
        'display_order',
    ];
}

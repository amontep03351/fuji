<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemImage extends Model
{
    use HasFactory;

    protected $table = 'system_images';

    protected $fillable = [
        'system_id',
        'image_url',
    ];

    /**
     * Get the product that owns the image.
     */
    public function system()
    {
        return $this->belongsTo(System::class, 'system_id');
    }
}

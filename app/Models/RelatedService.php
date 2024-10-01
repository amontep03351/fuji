<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedService extends Model
{
    use HasFactory;

    protected $fillable = ['service_id', 'related_service_id'];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function relatedService()
    {
        return $this->belongsTo(Service::class, 'related_service_id');
    }
}

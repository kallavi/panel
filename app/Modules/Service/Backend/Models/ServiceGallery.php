<?php

namespace App\Modules\Service\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceGallery extends Model
{
    protected $fillable = [
        'service_id',
        'slug'
    ];
}

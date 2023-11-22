<?php

namespace App\Modules\Service\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'seo_keywords',
        'seo_description'
    ];
}

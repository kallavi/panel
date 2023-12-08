<?php

namespace App\Modules\Photo\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class PhotoTranslation extends Model
{
    protected $fillable = [
        'locale',
        'name',
        'slug',
        'seo_keywords',
        'seo_description'
    ];
}

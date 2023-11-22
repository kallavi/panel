<?php

namespace App\Modules\News\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'brief',
        'description',
        'seo_keywords',
        'seo_description'
    ];
}

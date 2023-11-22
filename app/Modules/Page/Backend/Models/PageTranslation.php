<?php

namespace App\Modules\Page\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'seo_keywords',
        'seo_description'
    ];
}

<?php

namespace App\Modules\Blog\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
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

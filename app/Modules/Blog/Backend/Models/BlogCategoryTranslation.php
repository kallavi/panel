<?php

namespace App\Modules\Blog\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategoryTranslation extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];
}

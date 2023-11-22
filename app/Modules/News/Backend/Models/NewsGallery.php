<?php

namespace App\Modules\News\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class NewsGallery extends Model
{
    protected $fillable = [
        'news_id',
        'slug'
    ];
    
}

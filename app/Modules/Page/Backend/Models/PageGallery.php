<?php

namespace App\Modules\Page\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class PageGallery extends Model
{
    protected $fillable = [
        'page_id',
        'slug'
    ];
}

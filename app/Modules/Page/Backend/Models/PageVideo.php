<?php

namespace App\Modules\Page\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class PageVideo extends Model
{
    protected $fillable = [
        'page_id',
        'cover',
        'video'
    ];
}

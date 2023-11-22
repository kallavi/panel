<?php

namespace App\Modules\Page\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class PageDocument extends Model
{
    protected $fillable = [
        'page_id',
        'slug',
        'size'
    ];
}

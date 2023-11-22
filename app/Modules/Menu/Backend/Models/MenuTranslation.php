<?php

namespace App\Modules\Menu\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class MenuTranslation extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'content'
    ];
}

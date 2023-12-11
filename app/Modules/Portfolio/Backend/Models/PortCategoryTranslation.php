<?php

namespace App\Modules\Portfolio\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class PortCategoryTranslation extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];
}

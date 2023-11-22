<?php

namespace App\Modules\Slider\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    protected $fillable = [
        'image',
        'mobil_image',
        'name',
        'sub_title',
        'slug'
    ];
}

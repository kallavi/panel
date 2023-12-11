<?php

namespace App\Modules\Portfolio\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioTranslation extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'seo_keywords',
        'seo_description'
    ];
}

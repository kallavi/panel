<?php

namespace App\Modules\Portfolio\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioGallery extends Model
{
    protected $fillable = [
        'portfolio_id',
        'slug'
    ];
}

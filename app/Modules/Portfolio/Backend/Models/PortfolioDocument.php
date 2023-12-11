<?php

namespace App\Modules\Portfolio\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioDocument extends Model
{
    protected $fillable = [
        'portfolio_id',
        'slug',
        'size'
    ];
}

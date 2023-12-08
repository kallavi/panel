<?php

namespace App\Modules\Partner\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerTranslation extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];
}

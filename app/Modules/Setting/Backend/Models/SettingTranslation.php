<?php

namespace App\Modules\Setting\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
protected $table= 'setting_translations';

    protected $fillable = [
        'slug',
        'name',
        'description',
        'address',
        'logo',
        'dark_logo',
        'seo_keywords',
        'seo_description'
    ];
}

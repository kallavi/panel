<?php

namespace App\Modules\Settings\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class SettingsTranslation extends Model
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

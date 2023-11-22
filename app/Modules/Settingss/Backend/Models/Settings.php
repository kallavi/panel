<?php

namespace App\Modules\Settings\Backend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Translatable;

class Settings extends Model
{
    use HasFactory, Translatable;


    protected $fillable = [
        'phone',
        'fax',
        'e_mail',
        'province',
        'district',
        'whatsapp',
        'instagram',
        'facebook',
        'twitter',
        'youtube',
        'linkedin',
        'analytics',
        'recaptcha_key',
        'recaptcha_secret_key',
        'contact_mail',
        'bulletin_mail',
        'request_mail',
        'favicon'
    ];

    public $translatedAttributes = [
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

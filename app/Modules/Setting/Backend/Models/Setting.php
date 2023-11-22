<?php

namespace App\Modules\Setting\Backend\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Astrotomic\Translatable\Translatable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;

class Setting extends Model
{
    use HasFactory, Translatable, LogsActivity;


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



    public function getActivitylogOptions(): LogOptions
    {

        return LogOptions::defaults()
            ->logOnly([
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
        'favicon',
 'slug',
        'name',
        'description',
        'address',
        'logo',
        'dark_logo',
        'seo_keywords',
        'seo_description'

            ]);
    }
    public function tapActivity(Activity $activity, string $eventName)
    {

        if ($eventName == "created") {
            $activity->description = "Site Ayarı eklendi - {$activity->subject->name}";
        }
        if ($eventName == "updated") {
            $activity->description = "Site Ayarı güncellendi - {$activity->subject->name}";
        }
        if ($eventName == "deleted") {
            $activity->description = "Site Ayarı silindi - {$activity->subject->name}";
        }
    }


}

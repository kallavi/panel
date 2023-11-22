<?php

namespace App\Modules\Service\Backend\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;

class Service extends Model
{
    use HasFactory, Translatable, LogsActivity;

    protected $fillable = [
        'image',
        'status'
    ];

    public function gallery() {
        return $this->hasMany(ServiceGallery::class, 'service_id', 'id');
    }

    protected static function booted () {
        static::deleting(function(Service $service) {
            $service->gallery()->delete();
        });
    }

    public $translatedAttributes = [
        'name',
        'slug',
        'description',
        'seo_keywords',
        'seo_description'
    ];


    public function getActivitylogOptions(): LogOptions
    {

        return LogOptions::defaults()
            ->logOnly([
        'image',
        'status',
        'name',
        'slug',
        'description',
        'seo_keywords',
        'seo_description'

            ]);
    }
    public function tapActivity(Activity $activity, string $eventName)
    {

        if ($eventName == "created") {
            $activity->description = "Hizmet eklendi - {$activity->subject->name}";
        }
        if ($eventName == "updated") {
            $activity->description = "Hizmet güncellendi - {$activity->subject->name}";
        }
        if ($eventName == "deleted") {
            $activity->description = "Hizmet silindi - {$activity->subject->name}";
        }
    }
}

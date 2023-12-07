<?php

namespace App\Modules\Photo\Backend\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;

class Photo extends Model implements TranslatableContract
{
    use HasFactory, Translatable, LogsActivity;

    protected $fillable = [
        'image',
        'status'
    ];

    public function gallery()
    {
        return $this->hasMany(PhotoGallery::class, 'photo_id', 'id');
    }

    protected static function booted()
    {
        static::deleting(function (Photo $photo) {
            $photo->gallery()->delete();
        });
    }

    public $translatedAttributes = [
        'locale',
        'name',
        'slug',
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
                'seo_keywords',
                'seo_description'
            ]);
    }
    public function tapActivity(Activity $activity, string $eventName)
    {
        if ($eventName == "created") {
            $activity->description = "Fotoğraf Galeri eklendi - {$activity->subject->name}";
        }
        if ($eventName == "updated") {
            $activity->description = "Fotoğraf Galeri güncellendi - {$activity->subject->name}";
        }
        if ($eventName == "deleted") {
            $activity->description = "Fotoğraf Galeri silindi - {$activity->subject->name}";
        }
    }
}

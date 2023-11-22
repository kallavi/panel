<?php

namespace App\Modules\News\Backend\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;

class News extends Model
{
    use HasFactory, Translatable, LogsActivity;

    protected $fillable = [
        'image',
        'status',
        'featured',
        'category',
        'date'
    ];

    public function gallery()
    {
        return $this->hasMany(NewsGallery::class, 'news_id', 'id');
    }

    protected static function booted()
    {
        static::deleting(function (News $news) {
            $news->gallery()->delete();
        });
    }
    public function categoryR()
    {
        return $this->hasOne(NewsCategory::class, 'id', 'category');
    }
    public $translatedAttributes = [
        'name',
        'slug',
        'brief',
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
                'featured',
                'category',
                'date',
                'name',
                'slug',
                'brief',
                'description',
                'seo_keywords',
                'seo_description'

            ]);
    }
    public function tapActivity(Activity $activity, string $eventName)
    {

        if ($eventName == "created") {
            $activity->description = "Haber eklendi - {$activity->subject->name}";
        }
        if ($eventName == "updated") {
            $activity->description = "Haber güncellendi - {$activity->subject->name}";
        }
        if ($eventName == "deleted") {
            $activity->description = "Haber silindi - {$activity->subject->name}";
        }
    }
}

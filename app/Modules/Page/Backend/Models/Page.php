<?php

namespace App\Modules\Page\Backend\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;

class Page extends Model
{
    use HasFactory, Translatable, LogsActivity;

    protected $fillable = [
        'image',
        'video',
        'cover',
        'status'
    ];

    public function gallery() {
        return $this->hasMany(PageGallery::class, 'page_id', 'id');
    }

    public function documents() {
        return $this->hasMany(PageDocument::class, 'page_id', 'id');
    }

    // public function videos() {
    //     return $this->hasMany(PageVideo::class, 'page_id', 'id');
    // }

    protected static function booted () {
        static::deleting(function(Page $page) {
            $page->gallery()->delete();
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
        'video',
        'cover',
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
            $activity->description = "Sayfa eklendi - {$activity->subject->name}";
        }
        if ($eventName == "updated") {
            $activity->description = "Sayfa güncellendi - {$activity->subject->name}";
        }
        if ($eventName == "deleted") {
            $activity->description = "Sayfa silindi - {$activity->subject->name}";
        }
    }

}

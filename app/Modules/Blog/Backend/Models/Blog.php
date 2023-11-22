<?php

namespace App\Modules\Blog\Backend\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;

class Blog extends Model implements TranslatableContract
{
    use HasFactory, Translatable, LogsActivity;

    protected $fillable = [
        'image',
        'status',
        'featured',
        'category'
    ];

    public function gallery()
    {
        return $this->hasMany(BlogGallery::class, 'blog_id', 'id');
    }
    public function categoryR()
    {
        return $this->hasOne(BlogCategory::class, 'id', 'category');
    }

    protected static function booted()
    {
        static::deleting(function (Blog $blog) {
            $blog->gallery()->delete();
        });
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
            ->logOnly(['image',
            'status',
            'featured',
            'category',
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
            $activity->description = "Blog eklendi - {$activity->subject->name}";
        }
        if ($eventName == "updated") {
            $activity->description = "Blog güncellendi - {$activity->subject->name}";
        }
        if ($eventName == "deleted") {
            $activity->description = "Blog silindi - {$activity->subject->name}";
        }
    }
}

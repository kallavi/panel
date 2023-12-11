<?php

namespace App\Modules\Portfolio\Backend\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;

class Portfolio extends Model implements TranslatableContract
{
    use HasFactory, Translatable, LogsActivity;
    protected $fillable = [
        'image',
        'video',
        'cover',
        'status',
        'featured',
        'category',
        'date'
    ];

    public function gallery() {
        return $this->hasMany(PortfolioGallery::class, 'portfolio_id', 'id');
    }

    public function documents() {
        return $this->hasMany(PortfolioDocument::class, 'portfolio_id', 'id');
    }

    public function categoryR()
    {
        return $this->hasOne(PortCategory::class, 'id', 'category');
    }

    protected static function booted () {
        static::deleting(function(Portfolio $portfolio) {
            $portfolio->gallery()->delete();
            $portfolio->documents()->delete();
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
            $activity->description = "Portfolyo eklendi - {$activity->subject->name}";
        }
        if ($eventName == "updated") {
            $activity->description = "Portfolyo güncellendi - {$activity->subject->name}";
        }
        if ($eventName == "deleted") {
            $activity->description = "Portfolyo silindi - {$activity->subject->name}";
        }
    }
}

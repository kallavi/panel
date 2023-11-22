<?php

namespace App\Modules\Blog\Backend\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;

class BlogCategory extends Model implements TranslatableContract
{
    use HasFactory, Translatable, LogsActivity;

    protected $fillable = [
        'image',
        'name',
    ];

    public $translatedAttributes = [
        'name',
        'slug'
    ];

   
    public function getActivitylogOptions(): LogOptions
    {

        return LogOptions::defaults()
            ->logOnly([
            'image',
            'name',
            'name',
            'slug'

            ]);
    }
    public function tapActivity(Activity $activity, string $eventName)
    {

        if ($eventName == "created") {
            $activity->description = "Blog Kategori eklendi - {$activity->subject->name}";
        }
        if ($eventName == "updated") {
            $activity->description = "Blog Kategori güncellendi - {$activity->subject->name}";
        }
        if ($eventName == "deleted") {
            $activity->description = "Blog Kategori silindi - {$activity->subject->name}";
        }
    }

}

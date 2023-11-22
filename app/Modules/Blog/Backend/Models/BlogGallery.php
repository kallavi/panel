<?php

namespace App\Modules\Blog\Backend\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;

class BlogGallery extends Model
{
    use LogsActivity;
    protected $fillable = [
        'blog_id',
        'slug'
    ];


    public function getActivitylogOptions(): LogOptions
    {

        return LogOptions::defaults()
            ->logOnly([
            'blog_id',
            'slug'

            ]);
    }
    public function tapActivity(Activity $activity, string $eventName)
    {

        if ($eventName == "created") {
            $activity->description = "Blog Galeri eklendi - {$activity->subject->name}";
        }
        if ($eventName == "updated") {
            $activity->description = "Blog Galeri güncellendi - {$activity->subject->name}";
        }
        if ($eventName == "deleted") {
            $activity->description = "Blog Galeri silindi - {$activity->subject->name}";
        }
    }

}

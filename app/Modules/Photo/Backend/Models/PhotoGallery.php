<?php

namespace App\Modules\Photo\Backend\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;

class PhotoGallery extends Model
{
    use LogsActivity;
    protected $fillable = [
        'photo_id',
        'slug'
    ];


    public function getActivitylogOptions(): LogOptions
    {

        return LogOptions::defaults()
            ->logOnly([
                'photo_id',
                'slug'
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

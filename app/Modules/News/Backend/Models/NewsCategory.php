<?php

namespace App\Modules\News\Backend\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;

class NewsCategory extends Model implements TranslatableContract
{
    use HasFactory, Translatable, LogsActivity;

    protected $fillable = [
        'image',
        'name',
    ];

    public $translatedAttributes = [
        'name'
    ];

    public function getActivitylogOptions(): LogOptions
    {

        return LogOptions::defaults()
            ->logOnly([
                 'image',
        'name',
 

            ]);
    }
    public function tapActivity(Activity $activity, string $eventName)
    {

        if ($eventName == "created") {
            $activity->description = "Haber kategori eklendi - {$activity->subject->name}";
        }
        if ($eventName == "updated") {
            $activity->description = "Haber kategori güncellendi - {$activity->subject->name}";
        }
        if ($eventName == "deleted") {
            $activity->description = "Haber kategori silindi - {$activity->subject->name}";
        }
    }


}

<?php

namespace App\Modules\Slider\Backend\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;

class Slider extends Model implements TranslatableContract
{
    use HasFactory, Translatable, LogsActivity;

    protected $fillable = [
        'status'
    ];

    public $translatedAttributes = [
        'image',
        'mobil_image',
        'name',
        'sub_title',
        'slug'
    ];

    public function getActivitylogOptions(): LogOptions
    {

        return LogOptions::defaults()
            ->logOnly([
                'status',
                'image',
                'mobil_image',
                'name',
                'sub_title',
                'slug'

            ]);
    }
    public function tapActivity(Activity $activity, string $eventName)
    {

        if ($eventName == "created") {
            $activity->description = "Slider eklendi";
        }
        if ($eventName == "updated") {
            $activity->description = "Slider güncellendi";
        }
        if ($eventName == "deleted") {
            $activity->description = "Slider silindi";
        }
    }
}

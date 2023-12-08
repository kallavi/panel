<?php

namespace App\Modules\Partner\Backend\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;

class Partner extends Model implements TranslatableContract
{
    use HasFactory, Translatable, LogsActivity;

    protected $fillable = [
        'image',
        'status'
    ];

    public $translatedAttributes = [
        'name',
        'slug'
    ];

    public function getActivitylogOptions(): LogOptions
    {

        return LogOptions::defaults()
            ->logOnly(['image',
            'status',
            'name',
            'slug'
            ]);
    }
    public function tapActivity(Activity $activity, string $eventName)
    {

        if ($eventName == "created") {
            $activity->description = "Partner eklendi - {$activity->subject->name}";
        }
        if ($eventName == "updated") {
            $activity->description = "Partner güncellendi - {$activity->subject->name}";
        }
        if ($eventName == "deleted") {
            $activity->description = "Partner silindi - {$activity->subject->name}";
        }
    }

}

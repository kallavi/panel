<?php

namespace App\Modules\Portfolio\Backend\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;

class PortCategory extends Model implements TranslatableContract
{
    use HasFactory, Translatable, LogsActivity;

    protected $fillable = [
        'image',
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
            'slug'

            ]);
    }
    public function tapActivity(Activity $activity, string $eventName)
    {

        if ($eventName == "created") {
            $activity->description = "Portfolyo Kategori eklendi - {$activity->subject->name}";
        }
        if ($eventName == "updated") {
            $activity->description = "Portfolyo Kategori güncellendi - {$activity->subject->name}";
        }
        if ($eventName == "deleted") {
            $activity->description = "Portfolyo Kategori silindi - {$activity->subject->name}";
        }
    }

}

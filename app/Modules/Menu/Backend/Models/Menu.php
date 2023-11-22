<?php

namespace App\Modules\Menu\Backend\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Contracts\Activity;

class Menu extends Model
{
    use HasFactory, Translatable, LogsActivity;

    protected $fillable = [
        'parent',
        'child',
        'type'
    ];

    public $translatedAttributes = [
        'name',
        'slug',
        'content'
    ];


    public function getActivitylogOptions(): LogOptions
    {

        return LogOptions::defaults()
            ->logOnly([
                'parent',
                'child',
                'type',
                'name',
                'slug',
                'content'

            ]);
    }
    public function tapActivity(Activity $activity, string $eventName)
    {

        if ($eventName == "created") {
            $activity->description = "Menü eklendi - {$activity->subject->name}";
        }
        if ($eventName == "updated") {
            $activity->description = "Menü güncellendi - {$activity->subject->name}";
        }
        if ($eventName == "deleted") {
            $activity->description = "Menü silindi - {$activity->subject->name}";
        }
    }
}

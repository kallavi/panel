<?php

namespace App\Modules\Project\Backend\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $fillable = [
        'image',
        'name',
    ];

    public $translatedAttributes = [
        'name'
    ];
}

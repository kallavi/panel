<?php

namespace App\Modules\Project\Backend\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'image',
        'status',
        'featured',
        'category',
        'date'
    ];

    public function gallery() {
        return $this->hasMany(ProjectGallery::class, 'project_id', 'id');
    }

    protected static function booted () {
        static::deleting(function(Project $project) {
            $project->gallery()->delete();
        });
    }

    public $translatedAttributes = [
        'name',
        'slug',
        'brief',
        'description',
        'seo_keywords',
        'seo_description'
    ];
}

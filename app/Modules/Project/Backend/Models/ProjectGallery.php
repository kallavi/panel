<?php

namespace App\Modules\Project\Backend\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectGallery extends Model
{
    protected $fillable = [
        'project_id',
        'slug'
    ];
}

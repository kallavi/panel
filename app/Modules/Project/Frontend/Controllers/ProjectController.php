<?php

namespace App\Modules\Project\Frontend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Project\Backend\Models\Project;
use App\Modules\Project\Backend\Models\ProjectCategory;


class ProjectController extends Controller
{



    public function index($slug = null)
    {


        $project = Project::withTranslation()->where('status', 'published')->orderBy('date')->paginate(12);



        return view('front.project.index', [


            'project' => $project,

        ]);
    }
    public function detail($slug = null)
    {


        $project = Project::whereTranslation('slug', $slug)->first();

        $next_id = Project::where('status', "published")->where('id', '>', $project->id)->translatedIn(app()->getLocale())->min('id');
        $next = Project::withTranslation()->where('id', $next_id)->first();

        $prev_id = Project::where('status', "published")->where('id', '<', $project->id)->translatedIn(app()->getLocale())->max('id');
        $prev = Project::withTranslation()->where('id', $prev_id)->first();

        return view('front.project.detail', [

            'project' => $project,
            'next' => $next,
            'prev' => $prev,

        ]);
    }
}

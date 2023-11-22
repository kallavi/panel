<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Modules\Blog\Backend\Models\Blog;
use App\Modules\News\Backend\Models\News;
use App\Modules\Page\Backend\Models\Page;
use App\Modules\Project\Backend\Models\Project;
use App\Modules\Slider\Backend\Models\Slider;
use App\Modules\users\Backend\Models\Users;
use Spatie\Activitylog\Models\Activity;

class HomeController extends Controller
{
    public function index()
    {
        $news_count = News::all()->count();
        $blog_count = Blog::all()->count();
        $page_count = Page::all()->count();
        $project_count = Project::all()->count();
        $user_count = Users::all()->count();
        $slider_count = Slider::all()->count();

        $activity = Activity::latest()->take(15)->get();

        return view('admin.pages.home.index', ['activity' => $activity, 'news' => $news_count, 'blog' => $blog_count, 'page' => $page_count, 'project' => $project_count, 'user' => $user_count, 'slider' => $slider_count]);
    }
    public function activity()
    {



        $activity = Activity::orderBy('created_at')->paginate(20) ;


     


        $q= $activity->groupBy(function ($item) {
            return $item->created_at->format('d-m-Y');
        });
 
        return view('admin.pages.activities.index', ['activity' => $activity, 'q' => $q]);
    }
}

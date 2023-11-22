<?php

namespace App\Modules\News\Frontend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\News\Backend\Models\News;
use App\Modules\News\Backend\Models\NewsCategory;


class NewsController extends Controller
{



    public function index($slug = null)
    {
 

        $news = News::withTranslation()->where('status', 'published')->orderBy('date')->paginate(12);



        return view('front.news.index', [


            'news' => $news,

        ]);
    }
    public function detail($slug = null)
    {

 
        $news = News::whereTranslation('slug', $slug)->first();

        $next_id = News::where('status', "published")->where('id', '>', $news->id)->translatedIn(app()->getLocale())->min('id');
        $next = News::withTranslation()->where('id', $next_id)->first();

        $prev_id = News::where('status', "published")->where('id', '<', $news->id)->translatedIn(app()->getLocale())->max('id');
        $prev = News::withTranslation()->where('id', $prev_id)->first();


        return view('front.news.detail', [


            'news' => $news,
            'next' => $next,
            'prev' => $prev,

        ]);
    }
}

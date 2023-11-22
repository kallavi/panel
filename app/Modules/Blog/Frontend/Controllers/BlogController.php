<?php

namespace App\Modules\Blog\Frontend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Blog\Backend\Models\Blog;
 

class BlogController extends Controller
{



    public function index(string $locale,$slug = null)
    {
 


        $blog = Blog::translatedIn(app()->getLocale())->paginate(12);



        return view('front.blog.index', [
 
            'blog' => $blog,

        ]);
    }
    public function detail(string $locale, $slug = null)
    {


        $blog = Blog::whereTranslation('slug', $slug)->first();



        $next_id = Blog::where('status', "published")->where('id', '>', $blog->id)->translatedIn(app()->getLocale())->min('id');
        $next = Blog::withTranslation()->where('id', $next_id)->first();

        $prev_id = Blog::where('status', "published")->where('id', '<', $blog->id)->translatedIn(app()->getLocale())->max('id');
        $prev = Blog::withTranslation()->where('id', $prev_id)->first();




        return view('front.blog.detail', [

            'blog' => $blog,
            'next' => $next,
            'prev' => $prev,

        ]);
    }
}

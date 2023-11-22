<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Modules\Blog\Backend\Models\Blog;
use App\Modules\Service\Backend\Models\Service;
use App\Modules\Slider\Backend\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
 
        $blog = Blog::withTranslation()->where('status', 'published')->take(10)->get();
        $service = Service::withTranslation()->where('status', 'published')->take(10)->get();
        $slider = Slider::withTranslation()->where('status', 'published')->get();
       

        return view('front.home.index', [
            'blog' => $blog,
            'service' => $service,
            'slider' => $slider,
            
        ]);
    }
    
}

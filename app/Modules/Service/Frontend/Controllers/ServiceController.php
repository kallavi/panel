<?php

namespace App\Modules\Service\Frontend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Service\Backend\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{



    public function index(string $locale, $slug = null)
    {

 

        $service = Service::translatedIn(app()->getLocale())->paginate(12);

        return view('front.services.index', [

            'service' => $service,

        ]);
    }
    public function detail(string $locale, Request $request)
    {
 

        $service = Service::with(['gallery'])->translatedIn($locale)->where('id', $request->id)->first();
        $html = '';
 
        if($service->gallery){

   
        foreach ($service->gallery as $item) {

            $html .= '<div class="swiper-slide bg-transparent pb-lg-0 pb-4">
                                <div class="swiper-item">
                                    <img class="" src="' . asset($item->slug) . '"  alt="">  
                                </div>
                            </div>';
        }
        }

        return response()->json([
            'title' => $service->name,
            'desc' => $service->description,
            'gallery' => $html
        ]);

        // return view('front.service.detail', [

        //     'service' => $service,


        // ]);
    }
}

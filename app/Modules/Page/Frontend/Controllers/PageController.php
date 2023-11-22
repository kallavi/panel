<?php

namespace App\Modules\Page\Frontend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Menu\Backend\Models\Menu;
use App\Modules\Page\Backend\Models\Page;

class PageController extends Controller
{

    public function index($menu = null, $slug = null)
    {

        $getMenu = Menu::withTranslation()->where('slug', $menu)->first();
        $getPage = Page::whereTranslation('slug', $slug)->first();


        $getMenuList = Page::where('menu', $getMenu->id)->get();
   

        // $page = Page::withTranslation()->where('status', 'published')->orderBy('date')->first();
    


        return view('front.page.index', [


            'page' => $getPage,
            'menu' => $getMenuList,

        ]);
    }
}

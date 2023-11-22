<?php

namespace App\Modules\Menu\Frontend\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\Menu\Backend\Models\Menu;
use App\Modules\Page\Backend\Models\Page;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $locale,$category = null, $slug = null)
    {

        if ($slug == null) {
            $slug = $category;
        }
 
        $selected_menu = Menu::withTranslation()->whereTranslation('slug', $slug)->first();

        if ($selected_menu->type == 'url') {
          return  redirect()->to($selected_menu->content);
        }

         $page = Page::translatedIn('en')->where('id', $selected_menu->content)->first();


        return view('front.corporate.index', [
            'page' => $page
        ]);
    }
}

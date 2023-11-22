<?php

namespace App\Modules\Menu\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Menu\Backend\Models\Menu;
use App\Modules\Page\Backend\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Throwable;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        $pages = Page::all();
        return view('admin.pages.menus.index', compact('menus', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $menu = new Menu();
        $menu->fill($request->all());
        $slug_tr = Str::slug($request->{'name:tr'});
        $slug_en = Str::slug($request->{'name:en'});
        $translation_data = [];
        $translation_data['tr'] = [
            'slug' => $slug_tr
        ];
        $translation_data['en'] = [
            'slug' => $slug_en
        ];
        $menu->fill($translation_data);
        try {
            $menu->save();
            $status = 'success';
            $message = 'Menü Eklendi.';
            $menu = Menu::all();
            return redirect()->route('menus.index')->with( ['status' => $status, 'message' => $message, 'menus' => $menu] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            $menu = Menu::all();
            return redirect()->route('menus.index')->with( ['status' => $status, 'message' => $e, 'menus' => $menu] );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $menu->fill($request->all());
        $slug_tr = Str::slug($request->{'name:tr'});
        $slug_en = Str::slug($request->{'name:en'});
        $translation_data = [];
        $translation_data['tr'] = [
            'slug' => $slug_tr
        ];
        $translation_data['en'] = [
            'slug' => $slug_en
        ];
        $menu->fill($translation_data);
        try {
            $menu->save();
            $status = 'success';
            $message = 'Menü Eklendi.';
            $menu = Menu::all();
            return redirect()->route('menus.index')->with( ['status' => $status, 'message' => $message, 'menus' => $menu] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            $menu = Menu::all();
            return redirect()->route('menus.index')->with( ['status' => $status, 'message' => $e, 'menus' => $menu] );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $menu = Menu::findOrFail($id);
        try {
            $menu->delete();
            $status = 'success';
            $message = 'Menü Silindi.';
            return redirect()->route('menus.index')->with( ['status' => $status, 'message' => $message] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('menus.index')->with( ['status' => $status, 'message' => $message] );
        }
    }
}

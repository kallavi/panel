<?php

namespace App\Modules\News\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\News\Backend\Models\News;
use App\Modules\News\Backend\Models\NewsCategory;
use App\Modules\News\Backend\Models\NewsGallery;
use Illuminate\Http\Request;
use Throwable;

class CategoryController extends Controller
{
    public function index() {
        $categories = NewsCategory::all();
        return view('admin.pages.news.categories', compact('categories'));
    }

    function store(Request $request) {
        $category = new NewsCategory();
        $category->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/news'), $file_name);
            $image = 'uploads/news/' . $file_name;
            $category->image = $image;
        }

        $category->save();

        try {
            $category->save();
            $status = 'success';
            $message = 'Kategori Eklendi.';
            return redirect()->route('newscategories.index')->with( ['status' => $status, 'message' => $message] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('newscategories.index')->with( ['status' => $status, 'message' => $message] );
        }
    }

    public function update(Request $request) {
        $category = NewsCategory::find($request->id);
        $category->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/news'), $file_name);
            $image = 'uploads/news/' . $file_name;
            $category->image = $image;
        }

        try {
            $category->save();
            $status = 'success';
            $message = 'Kategori Güncellendi.';
            return redirect()->route('newscategories.index')->with( ['status' => $status, 'message' => $message] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('newscategories.index')->with( ['status' => $status, 'message' => $message] );
        }
    }

    public function destroy($id) {
        $category = NewsCategory::findOrFail($id);
        try {
            $category->delete();
            $status = 'success';
            $message = 'Kategori Silindi.';
            return redirect()->route('newscategories.index')->with( ['status' => $status, 'message' => $message] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('newscategories.index')->with( ['status' => $status, 'message' => $message] );
        }
    }
}

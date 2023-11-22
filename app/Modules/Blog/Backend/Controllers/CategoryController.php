<?php

namespace App\Modules\Blog\Backend\Controllers;

use App\Http\Controllers\Controller;
 use App\Modules\Blog\Backend\Models\BlogCategory;
 use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Throwable;

class CategoryController extends Controller
{
    public function index() {
        $categories = BlogCategory::all();
        return view('Blogs-Backend::categories', compact('categories'));
    }

    function store(Request $request) {
        $category = new BlogCategory();
        $category->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blog'), $file_name);
            $image = 'uploads/blog/' . $file_name;
            $category->image = $image;
        }
        $translation_data = [];
        $translation_data['tr'] = [
            'slug' => Str::slug($request->{'name:tr'})
        ];
        $translation_data['en'] = [
            'slug' => Str::slug($request->{'name:en'})
        ];

        $category->fill($translation_data);

        $category->save();

        try {
            $category->save();
            $status = 'success';
            $message = 'Kategori Eklendi.';
            return redirect()->route('blogcategories.index')->with( ['status' => $status, 'message' => $message] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('blogcategories.index')->with( ['status' => $status, 'message' => $message] );
        }
    }

    public function update(Request $request) {
        $category = BlogCategory::find($request->id);
        $category->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blog'), $file_name);
            $image = 'uploads/blog/' . $file_name;
            $category->image = $image;
        }

        try {
            $category->save();
            $status = 'success';
            $message = 'Kategori Güncellendi.';
            return redirect()->route('blogcategories.index')->with( ['status' => $status, 'message' => $message] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('blogcategories.index')->with( ['status' => $status, 'message' => $message] );
        }
    }

    public function destroy($id) {
        $category = BlogCategory::findOrFail($id);
        try {
            $category->delete();
            $status = 'success';
            $message = 'Kategori Silindi.';
            return redirect()->route('blogcategories.index')->with( ['status' => $status, 'message' => $message] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('blogcategories.index')->with( ['status' => $status, 'message' => $message] );
        }
    }
}

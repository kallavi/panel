<?php

namespace App\Modules\Portfolio\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Portfolio\Backend\Models\PortCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Throwable;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = PortCategory::all();
        return view('Portfolio-Backend::categories', compact('categories'));
    }

    function store(Request $request)
    {
        $category = new PortCategory();
        $category->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/portfolio'), $file_name);
            $image = 'uploads/portfolio/' . $file_name;
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
            return redirect()->route('admin.portfoliocategory.index')->with(['status' => $status, 'message' => $message]);
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('admin.portfoliocategory.index')->with(['status' => $status, 'message' => $message]);
        }
    }

    public function update(Request $request)
    {
        $category = PortCategory::find($request->id);
        $category->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/portfolio'), $file_name);
            $image = 'uploads/portfolio/' . $file_name;
            $category->image = $image;
        }

        try {
            $category->save();
            $status = 'success';
            $message = 'Kategori Güncellendi.';
            return redirect()->route('admin.portfoliocategory.index')->with(['status' => $status, 'message' => $message]);
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('admin.portfoliocategory.index')->with(['status' => $status, 'message' => $message]);
        }
    }

    public function destroy($id)
    {
        $category = PortCategory::findOrFail($id);
        try {
            $category->delete();
            $status = 'success';
            $message = 'Kategori Silindi.';
            return redirect()->route('admin.portfoliocategory.index')->with(['status' => $status, 'message' => $message]);
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('admin.portfoliocategory.index')->with(['status' => $status, 'message' => $message]);
        }
    }
}

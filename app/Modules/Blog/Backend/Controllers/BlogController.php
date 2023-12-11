<?php

namespace App\Modules\Blog\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Blog\Backend\Models\Blog;
use App\Modules\Blog\Backend\Models\BlogCategory;
use App\Modules\Blog\Backend\Models\BlogGallery;
use Illuminate\Http\Request;
use Throwable;

class BlogController extends Controller
{

    public function index()
    {

        $blogs = Blog::with('categoryR')->get();
        return view('Blog-Backend::index', compact('blogs'));
    }

    public function delete($id)
    {
        $user = Blog::find($id);
        $user->delete();
        session()->flash('status', 'success');
        session()->flash('title', 'Başarıyla silindi!');
        session()->flash('message', $user->id . ' numaralı Birim silindi!');
        return redirect()->route('admin.blogs.index');
    }

    function store(Request $request)
    {
        $blog = new Blog();
        $blog->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blog'), $file_name);
            $image = 'uploads/blog/' . $file_name;
            $blog->image = $image;
        }

        $blog->save();

        if ($request->hasFile('photos')) {
            foreach ($request->photos as $photo) {
                $file_name = uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/blog'), $file_name);
                $blog->gallery()->create([
                    'slug' => 'uploads/blog/' . $file_name,
                ]);
            }
        }
        return redirect()->route('admin.blogs.edit', $blog->id);
    }

    public function update(Request $request, Blog $blog)
    {
        $blog->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/blog'), $file_name);
            $image = 'uploads/blog/' . $file_name;
            $blog->image = $image;
        }

        try {
            $blog->save();
            if ($request->hasFile('photos')) {
                foreach ($request->photos as $photo) {
                    $file_name = uniqid() . '.' . $photo->getClientOriginalExtension();
                    $photo->move(public_path('uploads/blog'), $file_name);
                    $blog->gallery()->create([
                        'slug' => 'uploads/blog/' . $file_name,
                    ]);
                }
            }
            $status = 'success';
            $message = 'Blog Güncellendi.';
            return redirect()->route('blogs.edit', $blog->id)->with(['status' => $status, 'message' => $message]);
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('admin.blogs.edit', $blog->id)->with(['status' => $status, 'message' => $message]);
        }
    }

    public function galleryDelete(Request $request)
    {

        $blogGallery = BlogGallery::where('slug', 'uploads/blog/' . $request->slug)->first();

        $blogGallery->delete();
        return $blogGallery;
    }


    public function edit(Blog $blog)
    {
        $blogGallery = Blog::with('gallery')->where('id', $blog->id)->first();
        $blogCategory = BlogCategory::all();
        return view('Blog-Backend::edit', (['blog' => $blog, 'gallery' => $blogGallery, 'categories' => $blogCategory]));
    }
    public function show(Blog $blog)
    {
        //
    }
    public function create()
    {
        $categories = BlogCategory::all();
        return view('Blog-Backend::create', compact('categories'));
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        try {
            $blog->delete();
            $status = 'success';
            $message = 'Blog Silindi.';
            return redirect()->route('blogs.index')->with(['status' => $status, 'message' => $message]);
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('admin.blogs.index')->with(['status' => $status, 'message' => $message]);
        }
    }
}

<?php

namespace App\Modules\News\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\News\Backend\Models\News;
use App\Modules\News\Backend\Models\NewsCategory;
use App\Modules\News\Backend\Models\NewsGallery;
use Illuminate\Http\Request;
use Throwable;
use Yajra\DataTables\DataTables;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {

    //     if ($request->ajax()) {
    //         $data = News::latest()->get();
    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function ($row) {
    //                 $btn = '<div class="col-md-4"> <a class="btn btn-sm btn-icon btn-primary" href="' . route("news.edit", $row->id) . '" title="Güncelle"><i class="bi bi-pencil-square fs-3"></i></a>  </div> <div class="col-md-4"> <a href="' . route("admin.news.delete", $row->id) . '">  <button class="btn btn-sm btn-icon btn-danger"><i class="bi bi-trash fs-3"></i></button>  </a> </div>';
    //                 return $btn;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }

    //     return view('admin.pages.news.index');
    // }

    public function index() {
        $news_list = News::all();
        return view('admin.pages.news.index', compact('news_list'));
    }


    public function delete($id)
    {
        $user = News::find($id);
        $user->delete();
        session()->flash('status', 'success');
        session()->flash('title', 'Başarıyla silindi!');
        session()->flash('message', $user->id . ' numaralı Birim silindi!');
        return redirect()->route('admin.news.index');
    }

    function store(Request $request)
    {
        $news = new News();
        $news->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/news'), $file_name);
            $image = 'uploads/news/' . $file_name;
            $news->image = $image;
        }

        $news->save();
        if ($request->hasFile('photos')) {
            foreach ($request->photos as $photo) {
                $file_name = uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/news'), $file_name);
                $news->gallery()->create([
                    'slug' => 'uploads/news/' . $file_name,
                ]);
            }
        }
        return redirect()->route('news.edit', $news->id);
    }

    public function update(Request $request, News $news)
    {
        $news->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/news'), $file_name);
            $image = 'uploads/news/' . $file_name;
            $news->image = $image;
        }

        try {
            $news->save();
            if ($request->hasFile('photos')) {
                foreach ($request->photos as $photo) {
                    $file_name = uniqid() . '.' . $photo->getClientOriginalExtension();
                    $photo->move(public_path('uploads/news'), $file_name);
                    $news->gallery()->create([
                        'slug' => 'uploads/news/' . $file_name,
                    ]);
                }
            }
            $status = 'success';
            $message = 'Haber Güncellendi.';
            return redirect()->route('news.edit', $news->id)->with(['status' => $status, 'message' => $message]);
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('news.edit', $news->id)->with(['status' => $status, 'message' => $message]);
        }
    }

    public function galleryDelete(Request $request)
    {
        $newsGallery = NewsGallery::where('slug', 'uploads/news/' . $request->slug)->first();

        $newsGallery->delete();
        return $newsGallery;
    }

    public function edit(News $news)
    {
        $newsGallery = News::with('gallery')->where('id', $news->id)->first();
        $newsCategory = NewsCategory::all();
        return view('admin.pages.news.edit', (['news' => $news, 'gallery' => $newsGallery, 'categories' => $newsCategory]));
    }

    public function create()
    {
        $categories = NewsCategory::all();
        return view('admin.pages.news.create', compact('categories'));
    }

    public function destroy($id) {
        $news = News::findOrFail($id);
        try {
            $news->delete();
            $status = 'success';
            $message = 'Haber Silindi.';
            return redirect()->route('admin.news.index')->with( ['status' => $status, 'message' => $message] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('admin.news.index')->with( ['status' => $status, 'message' => $message] );
        }
    }
}

<?php

namespace App\Modules\Page\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Page\Backend\Models\Page;
use App\Modules\Page\Backend\Models\PageGallery;
use App\Modules\Page\Backend\Models\PageTranslation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Throwable;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $page = new Page();
        $page->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/page'), $file_name);
            $image = 'uploads/page/' . $file_name;
            $page->image = $image;
        }
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/page'), $file_name);
            $cover = 'uploads/page/' . $file_name;
            $page->cover = $cover;
        }

        $page->save();

        if ($request->hasFile('photos')) {
            foreach ($request->photos as $photo) {
                $file_name = uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/page'), $file_name);
                $page->gallery()->create([
                    'slug' => 'uploads/page/' . $file_name,
                ]);
            }
        }
        if ($request->hasFile('documents')) {
            foreach ($request->documents as $document) {
                $file_name = uniqid() . '.' . $document->getClientOriginalExtension();
                $size = $document->getSize();
                $document->move(public_path('uploads/page'), $file_name);
                $page->documents()->create([
                    'slug' => 'uploads/page/' . $file_name,
                    'size' => $size
                ]);
            }
        }
        return redirect()->route('pages.edit', $page->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        $gallery = Page::with('gallery')->where('id', $page->id)->first();
        $documents = Page::with('documents')->where('id', $page->id)->first();
        return view('admin.pages.page.edit', (['page' => $page, 'gallery' => $gallery, 'documents' => $documents ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $page->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/page'), $file_name);
            $image = 'uploads/page/' . $file_name;
            $page->image = $image;
        }
        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/page'), $file_name);
            $cover = 'uploads/page/' . $file_name;
            $page->cover = $cover;
        }

        try {
            $page->save();
            if ($request->hasFile('photos')) {
                foreach ($request->photos as $photo) {
                    $file_name = uniqid() . '.' . $photo->getClientOriginalExtension();
                    $photo->move(public_path('uploads/page'), $file_name);
                    $page->gallery()->create([
                        'slug' => 'uploads/page/' . $file_name,
                    ]);
                }
            }
            if ($request->hasFile('documents')) {
                foreach ($request->documents as $document) {
                    $file_name = uniqid() . '.' . $document->getClientOriginalExtension();
                    $size = $document->getSize();
                    $document->move(public_path('uploads/page'), $file_name);
                    $page->documents()->create([
                        'slug' => 'uploads/page/' . $file_name,
                        'size' => $size
                    ]);
                }
            }
            $status = 'success';
            $message = 'Sayfa Güncellendi.';
            return redirect()->route('pages.edit', $page->id)->with( ['status' => $status, 'message' => $message] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('pages.edit', $page->id)->with( ['status' => $status, 'message' => $message] );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $page = Page::findOrFail($id);
        try {
            $page->delete();
            $status = 'success';
            $message = 'Sayfa Silindi.';
            return redirect()->route('pages.index')->with( ['status' => $status, 'message' => $message] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('pages.index')->with( ['status' => $status, 'message' => $message] );
        }
    }
}

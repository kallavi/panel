<?php

namespace App\Modules\Photo\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Photo\Backend\Models\Photo;
use Illuminate\Http\Request;
use Throwable;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::all();
        return view('Photo-Backend::index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Photo-Backend::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $photo = new Photo();
        $photo->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/photo'), $file_name);
            $image = 'uploads/photo/' . $file_name;
            $photo->image = $image;
        }

        try {
            $photo->save();
            return response()->json(['status' => "success", 'message' => 'Fotoğraf Galeri Eklendi.', 'photo_id' => $photo->id]);
        } catch (Throwable $e) {
            return response()->json(['status' => "danger", 'message' => 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..', 'photo_id' => $photo->id]);
        }
    }

    public function upload(Request $request)
    {
        $photo = Photo::find($request->photo_id);
        if (request()->hasFile('file')) {
            $img = $request->file('file');
            $file_name = uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('uploads/photo'), $file_name);
            $photo->gallery()->create([
                'slug' => 'uploads/photo/' . $file_name,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        $photoGallery = Photo::with('gallery')->where('id', $photo->id)->first();
        return view('Photo-Backend::edit', (['photo' => $photo, 'gallery' => $photoGallery]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photo $photo)
    {
        $photo->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/photo'), $file_name);
            $image = 'uploads/photo/' . $file_name;
            $photo->image = $image;
        }
        try {
            $photo->save();
            return response()->json(['status' => "success", 'message' => 'Fotoğraf Galeri Güncellendi.', 'photo_id' => $photo->id]);
        } catch (Throwable $e) {
            return response()->json(['status' => "danger", 'message' => 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..', 'photo_id' => $photo->id, 'e' => $e]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);
        try {
            $photo->delete();
            $status = 'success';
            $message = 'Fotoğraf Galeri Silindi.';
            return redirect()->route('admin.photo.index')->with(['status' => $status, 'message' => $message]);
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('admin.photo.index')->with(['status' => $status, 'message' => $message]);
        }
    }
}

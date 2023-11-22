<?php

namespace App\Modules\Service\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Service\Backend\Models\Service;
use Illuminate\Http\Request;
use Throwable;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.pages.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $service = new Service();
        $service->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/services'), $file_name);
            $image = 'uploads/services/' . $file_name;
            $service->image = $image;
        }

        $service->save();

        if ($request->hasFile('photos')) {
            foreach ($request->photos as $photo) {
                $file_name = uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/services'), $file_name);
                $service->gallery()->create([
                    'slug' => 'uploads/services/' . $file_name,
                ]);
            }
        }
        return redirect()->route('services.edit', $service->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $gallery = Service::with('gallery')->where('id', $service->id)->first();
        return view('admin.pages.service.edit', (['service' => $service, 'gallery' => $gallery ]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $service->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/services'), $file_name);
            $image = 'uploads/services/' . $file_name;
            $service->image = $image;
        }

        try {
            $service->save();
            if ($request->hasFile('photos')) {
                foreach ($request->photos as $photo) {
                    $file_name = uniqid() . '.' . $photo->getClientOriginalExtension();
                    $photo->move(public_path('uploads/services'), $file_name);
                    $service->gallery()->create([
                        'slug' => 'uploads/services/' . $file_name,
                    ]);
                }
            }
            $status = 'success';
            $message = 'Sayfa Güncellendi.';
            return redirect()->route('services.edit', $service->id)->with( ['status' => $status, 'message' => $message] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('services.edit', $service->id)->with( ['status' => $status, 'message' => $message] );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        try {
            $service->delete();
            $status = 'success';
            $message = 'Hizmet Silindi.';
            return redirect()->route('services.index')->with( ['status' => $status, 'message' => $message] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('services.index')->with( ['status' => $status, 'message' => $message] );
        }
    }
}

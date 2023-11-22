<?php

namespace App\Modules\Slider\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Slider\Backend\Models\Slider;
use Illuminate\Http\Request;
use Throwable;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.pages.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $slider = new Slider();
        $slider->fill($request->all());

        $translation_data = [];

        if ($request->hasFile('image:tr')) {
            $file = $request->file('image:tr');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/slider'), $file_name);
            $image = 'uploads/slider/' . $file_name;
        } else {
            $image = '';
        }

        if ($request->hasFile('mobil_image:tr')) {
            $file = $request->file('mobil_image:tr');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/slider'), $file_name);
            $mobil_image = 'uploads/slider/' . $file_name;
        } else {
            $mobil_image = '';
        }
        $translation_data['tr'] = [
            'image' => $image,
            'mobil_image' => $mobil_image
        ];

        if ($request->hasFile('image:en')) {
            $file = $request->file('image:en');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/slider'), $file_name);
            $image = 'uploads/slider/' . $file_name;
        } else {
            $image = '';
        }

        if ($request->hasFile('mobil_image:en')) {
            $file = $request->file('mobil_image:en');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/slider'), $file_name);
            $mobil_image = 'uploads/slider/' . $file_name;
        } else {
            $mobil_image = '';
        }

        $translation_data['en'] = [
            'image' => $image,
            'mobil_image' => $mobil_image
        ];

        $slider->fill($translation_data);
        $slider->save();

        return redirect()->route('sliders.edit', $slider->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        return view('admin.pages.slider.edit', (['slider' => $slider]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $slider->fill($request->all());
        $sliders = Slider::find($slider->id);
        $translation_data = [];

        if ($request->hasFile('image:tr')) {
            $file = $request->file('image:tr');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/slider'), $file_name);
            $image = 'uploads/slider/' . $file_name;
        } else {
            $image = $sliders->{'image:tr'};
        }

        if ($request->hasFile('mobil_image:tr')) {
            $file = $request->file('mobil_image:tr');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/slider'), $file_name);
            $mobil_image = 'uploads/slider/' . $file_name;
        } else {
            $mobil_image = $sliders->{'mobil_image:tr'};
        }

        $translation_data['tr'] = [
            'image' => $image,
            'mobil_image' => $mobil_image
        ];

        if ($request->hasFile('image:en')) {
            $file = $request->file('image:en');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/slider'), $file_name);
            $image = 'uploads/slider/' . $file_name;
        } else {
            $image = $sliders->{'image:en'};
        }

        if ($request->hasFile('mobil_image:en')) {
            $file = $request->file('mobil_image:en');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/slider'), $file_name);
            $mobil_image = 'uploads/slider/' . $file_name;

            $translation_data['en'] = [
                'image' => $image,
                'mobil_image' => $mobil_image
            ];
        } else {
            $mobil_image = $sliders->{'mobil_image:en'};
        }

        $slider->fill($translation_data);

        try {
            $slider->save();
            $status = 'success';
            $message = 'Slider Güncellendi.';
            return redirect()->route('sliders.edit', $slider->id)->with(['status' => $status, 'message' => $message]);
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('sliders.edit', $slider->id)->with(['status' => $status, 'message' => $message]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $menu = Slider::findOrFail($id);
        try {
            $menu->delete();
            $status = 'success';
            $message = 'Slider Silindi.';
            return redirect()->route('sliders.index')->with( ['status' => $status, 'message' => $message] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('sliders.index')->with( ['status' => $status, 'message' => $message] );
        }
    }
}

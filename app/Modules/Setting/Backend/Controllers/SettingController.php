<?php

namespace App\Modules\Setting\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Setting\Backend\Models\Setting;
use Illuminate\Http\Request;
use Throwable;

class SettingController extends Controller
{
    public function index()
    {
        //
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
        $setting = new Setting();
        $setting->fill($request->all());
        $setting->save();
        $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('admin.pages.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {

        $setting->fill($request->all());
        $translation_data = [];

        if ($request->hasFile('logo:tr')) {
            $file = $request->file('logo:tr');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/setting'), $file_name);
            $logo = 'uploads/setting/' . $file_name;
        } else {
            $logo = $setting->{'logo:tr'};
        }

        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/setting'), $file_name);
            $favicon = 'uploads/setting/' . $file_name;
            $setting->favicon = $favicon;
        }

        if ($request->hasFile('dark_logo:tr')) {
            $file = $request->file('dark_logo:tr');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/setting'), $file_name);
            $dark_logo = 'uploads/setting/' . $file_name;
        } else {
            $dark_logo = $setting->{'dark_logo:tr'};
        }

        $translation_data['tr'] = [
            'logo' => $logo,
            'dark_logo' => $dark_logo
        ];

        if ($request->hasFile('logo:en')) {
            $file = $request->file('logo:en');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/setting'), $file_name);
            $logo = 'uploads/setting/' . $file_name;
        } else {
            $logo = $setting->{'logo:en'};
        }

        if ($request->hasFile('dark_logo:en')) {
            $file = $request->file('dark_logo:en');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/setting'), $file_name);
            $dark_logo = 'uploads/setting/' . $file_name;
        } else {
            $dark_logo = $setting->{'mobil_image:en'};
        }

        $translation_data['en'] = [
            'logo' => $logo,
            'dark_logo' => $dark_logo
        ];

        $setting->fill($translation_data);
        try {
            $setting->save();
            $status = 'success';
            $message = 'Site Güncellendi.';
            return redirect()->route('admin.setting.edit', $request->id)->with( ['status' => $status, 'message' => $message] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('admin.setting.edit', $request->id)->with( ['status' => $status, 'message' => $message] );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}

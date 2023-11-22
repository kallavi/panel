<?php

namespace App\Modules\Settings\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Settings\Backend\Models\Settings;
use Illuminate\Http\Request;
use Throwable;

class SettingsController extends Controller
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
        $sliders = new Settings();
        $sliders->fill($request->all());
        $sliders->save();
        $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $settings = Settings::find($id);
        return view('admin.pages.settings.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Settings $settings)
    {
        $settings2 = Settings::withTranslation()->where('id', $request->id)->first();

        $settings2->fill($request->all());
        $settings2->save();
        dd('oldu');
        try {
            $status = 'success';
            $message = 'Site Güncellendi.';
            return redirect()->route('admin.settings.edit', $request->id)->with( ['status' => $status, 'message' => $message] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('admin.settings.edit', $request->id)->with( ['status' => $status, 'message' => $message] );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Settings $settings)
    {
        //
    }
}

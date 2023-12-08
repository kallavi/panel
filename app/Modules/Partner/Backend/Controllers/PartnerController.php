<?php

namespace App\Modules\Partner\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Partner\Backend\Models\Partner;
use Illuminate\Http\Request;
use Throwable;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        return view('Partner-Backend::index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Partner-Backend::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $partner = new Partner();
        $partner->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/partner'), $file_name);
            $image = 'uploads/partner/' . $file_name;
            $partner->image = $image;
        }

        $partner->save();
        return redirect()->route('admin.partner.edit', $partner->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $partner)
    {
        return view('Partner-Backend::edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $partner)
    {
        $partner->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/partner'), $file_name);
            $image = 'uploads/partner/' . $file_name;
            $partner->image = $image;
        }

        try {
            $partner->save();
            $status = 'success';
            $message = 'Partner Güncellendi.';
            return redirect()->route('admin.partner.edit', $partner->id)->with(['status' => $status, 'message' => $message]);
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('admin.partner.edit', $partner->id)->with(['status' => $status, 'message' => $message]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        try {
            $partner->delete();
            $status = 'success';
            $message = 'Partner Silindi.';
            return redirect()->route('admin.partner.index')->with(['status' => $status, 'message' => $message]);
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('admin.partners.index')->with(['status' => $status, 'message' => $message]);
        }
    }
}

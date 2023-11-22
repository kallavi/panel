<?php

namespace App\Modules\Slug\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Slug\Backend\Models\Slug;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        //
    }

    public function generate(Request $request)
    {

        return Str::slug($request->name);
    }

    /**
     * Display the specified resource.
     */
    public function show(Slug $slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slug $slug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slug $slug)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slug $slug)
    {
        //
    }
}

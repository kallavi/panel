<?php

namespace App\Modules\Portfolio\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Portfolio\Backend\Models\PortCategory;
use App\Modules\Portfolio\Backend\Models\Portfolio;
use App\Modules\Portfolio\Backend\Models\PortfolioDocument;
use App\Modules\Portfolio\Backend\Models\PortfolioGallery;
use Illuminate\Http\Request;
use Throwable;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::with('categoryR')->get();
        return view('Portfolio-Backend::index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = PortCategory::all();
        return view('Portfolio-Backend::create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $portfolio = new Portfolio();
        $portfolio->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/portfolio'), $file_name);
            $image = 'uploads/portfolio/' . $file_name;
            $portfolio->image = $image;
        }

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/portfolio'), $file_name);
            $cover = 'uploads/portfolio/' . $file_name;
            $portfolio->cover = $cover;
        }

        $portfolio->save();

        if ($request->hasFile('photos')) {
            foreach ($request->photos as $photo) {
                $file_name = uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/portfolio'), $file_name);
                $portfolio->gallery()->create([
                    'slug' => 'uploads/portfolio/' . $file_name,
                ]);
            }
        }
        if ($request->hasFile('documents')) {
            foreach ($request->documents as $document) {
                $file_name = uniqid() . '.' . $document->getClientOriginalExtension();
                $size = $document->getSize();
                $document->move(public_path('uploads/portfolio'), $file_name);
                $portfolio->documents()->create([
                    'slug' => 'uploads/portfolio/' . $file_name,
                    'size' => $size
                ]);
            }
        }
        return redirect()->route('admin.portfolio.edit', $portfolio->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio)
    {
        $gallery = Portfolio::with('gallery')->where('id', $portfolio->id)->first();
        $documents = Portfolio::with('documents')->where('id', $portfolio->id)->first();
        $category = PortCategory::all();
        return view('Portfolio-Backend::edit', (['portfolio' => $portfolio, 'gallery' => $gallery, 'categories' => $category, 'documents' => $documents]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        $portfolio->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/portfolio'), $file_name);
            $image = 'uploads/portfolio/' . $file_name;
            $portfolio->image = $image;
        }

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/portfolio'), $file_name);
            $cover = 'uploads/portfolio/' . $file_name;
            $portfolio->cover = $cover;
        }

        try {
            $portfolio->save();
            if ($request->hasFile('photos')) {
                foreach ($request->photos as $photo) {
                    $file_name = uniqid() . '.' . $photo->getClientOriginalExtension();
                    $photo->move(public_path('uploads/portfolio'), $file_name);
                    $portfolio->gallery()->create([
                        'slug' => 'uploads/portfolio/' . $file_name,
                    ]);
                }
            }
            if ($request->hasFile('documents')) {
                foreach ($request->documents as $document) {
                    $file_name = uniqid() . '.' . $document->getClientOriginalExtension();
                    $size = $document->getSize();
                    $document->move(public_path('uploads/portfolio'), $file_name);
                    $portfolio->documents()->create([
                        'slug' => 'uploads/portfolio/' . $file_name,
                        'size' => $size
                    ]);
                }
            }
            $status = 'success';
            $message = 'Portfolyo Güncellendi.';
            return redirect()->route('admin.portfolio.edit', $portfolio->id)->with(['status' => $status, 'message' => $message]);
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('admin.portfolio.edit', $portfolio->id)->with(['status' => $status, 'message' => $message]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        try {
            $portfolio->delete();
            $status = 'success';
            $message = 'Portfolio Silindi.';
            return redirect()->route('admin.portfolio.index')->with(['status' => $status, 'message' => $message]);
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('admin.portfolio.index')->with(['status' => $status, 'message' => $message]);
        }
    }

    public function galleryDelete(Request $request)
    {

        $portfolioGallery = PortfolioGallery::where('slug', 'uploads/portfolio/' . $request->slug)->first();

        $portfolioGallery->delete();
        return $portfolioGallery;
    }

    public function documentsDelete(Request $request)
    {

        $portfolioDocument = PortfolioDocument::where('slug', 'uploads/portfolio/' . $request->slug)->first();

        $portfolioDocument->delete();
        return $portfolioDocument;
    }
}

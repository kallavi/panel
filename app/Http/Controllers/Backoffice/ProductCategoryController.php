<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use  DataTables;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    private array $breadcrumb;

    public function __construct()
    {

        $this->breadcrumb = [
            'subTitle' => 'Kategori',
            'viewTitle' => 'Kategori'
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        if ($request->ajax()) {
            $data = ProductCategory::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $column = '  <a class="btn btn-sm btn-icon btn-primary" href="' . route("admin.productcategory.edit", $row->id) . '" title="Güncelle"><i class="bi bi-pencil-square fs-3"></i></a>   <a href="' . route("admin.productcategory.delete", $row->id) . '">  <button class="btn btn-sm btn-icon btn-danger"><i class="bi bi-trash fs-3"></i></button>  </a>  ';

                    return $column;
                })
            
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        $column = '<span class="badge badge-pill badge-success">Aktif</span>';
                    } else {
                        $column = '<span class="badge badge-pill badge-danger">Pasif</span>';
                    }

                    return $column;
                })

                ->rawColumns(['action',  'status'])
                ->make(true);
        }
        return view('backoffice.pages.productcategory.index', (['breadcrumb' => $this->breadcrumb]));
    }
    public function delete($id)
    {
        $productcategory = ProductCategory::find($id);
        $productcategory->delete();
        session()->flash('status', 'success');
        session()->flash('title', 'Başarıyla silindi!');
        session()->flash('message', $productcategory->id . ' numaralı Birim silindi!');
        return redirect()->route('admin.productcategory.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backoffice.pages.productcategory.create', (['breadcrumb' => $this->breadcrumb]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $productcategory = new ProductCategory();

    
        $productcategory->fill([

            'title' => $request->title,
            'name' => $request->name,
            'slug' => Str::slug($request->title),
            'image' => $request->image,

            'sort' => $request->sort,
            'status' => $request->status,


        ]);



        $productcategory->save();

        if ($productcategory) {
            session()->flash('status', 'success');
            session()->flash('title', 'Kategori başarıyla eklendi!');
            session()->flash('message',  'Kategori sisteme eklendi!');
            return redirect()->route('admin.productcategory.index');
        } else {
            session()->flash('status', 'error');
            session()->flash('title', 'Kategori eklenmedi!');
            session()->flash('message', 'Kategori eklenirken bir hata oluştu!');
        }
        return redirect()->route('admin.productcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productcategory  $productcategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productcategory  $productcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productcategory)
    {



        return view('backoffice.pages.productcategory.edit', (['productcategory' => $productcategory, 'breadcrumb' => $this->breadcrumb]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productcategory  $productcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productcategory)
    {


   

        $productcategory->fill([
            'title' => $request->title,
            'slug' => Str::slug($request->title),

           
            'name' => $request->name,
            'image' => $request->image,
            'sort' => $request->sort,
            'status' => $request->status,

        ]);

        $productcategory->save();

        if ($productcategory) {
            session()->flash('status', 'success');
            session()->flash('title', 'Kategori başarıyla güncellendi!');
            session()->flash('message',  'Kategori başarıyla güncellendi!');
            return redirect()->route('admin.productcategory.index');
        } else {
            session()->flash('status', 'error');
            session()->flash('title', 'Kategori eklenmedi!');
            session()->flash('message', 'Kategori eklenirken bir hata oluştu!');
        }

        return redirect()->route('admin.productcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productcategory  $productcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productcategory $productcategory)
    {

        $productcategory->delete();
        session()->flash('status', 'success');
        session()->flash('title', 'Başarıyla silindi!');
        session()->flash('message', $productcategory->id . ' numaralı Kategori silindi!');
        return redirect()->route('admin.productcategory.index');
    }
}

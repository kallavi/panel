<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use  DataTables;
use Illuminate\Support\Str;
use App\Libraries\Services\FilesService;
use App\Models\Committee;
use App\Models\ProductCategory;

class ProductController extends Controller
{
    private array $breadcrumb;

    public function __construct()
    {

        $this->breadcrumb = [
            'subTitle' => 'Ürün',
            'viewTitle' => 'Ürün'
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
            $data = Product::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $column = '  <a class="btn btn-sm btn-icon btn-primary" href="' . route("admin.product.edit", $row->id) . '" title="Güncelle"><i class="bi bi-pencil-square fs-3"></i></a>   <a href="' . route("admin.product.delete", $row->id) . '">  <button class="btn btn-sm btn-icon btn-danger"><i class="bi bi-trash fs-3"></i></button>  </a>  ';

                    return $column;
                })
                ->addColumn('image', function ($row) {

                    $column = '<img width="100" height="100" src="' . asset($row->image) . '"/>';

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

                ->rawColumns(['action', 'image', 'status'])
                ->make(true);
        }
        return view('backoffice.pages.product.index', (['breadcrumb' => $this->breadcrumb]));
    }
    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        session()->flash('status', 'success');
        session()->flash('title', 'Başarıyla silindi!');
        session()->flash('message', $product->id . ' numaralı Birim silindi!');
        return redirect()->route('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $product_category= ProductCategory::all();
     

        return view('backoffice.pages.product.create', (['breadcrumb' => $this->breadcrumb,'product_category' =>  $product_category ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
// dd($request) ;     
   $product = new Product();



        if ($request->hasFile('image')) {

            $file_name = uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('data/uploads/product'), $file_name);
            $image = $file_name;

            $product->fill([
                'image' => 'data/uploads/product/' . $image,
            ]);
        }
 

        $product->fill([

            'title' => $request->title,
            'description' => $request->description,
            'cycle' => $request->cycle,
            'type' => $request->type,
            'price' =>  $request->price ,
            'slug' => Str::slug($request->title),

            'category_id' => $request->category_id,

            'sort' => $request->sort,
            'status' => $request->status,


        ]);



        $product->save();


        if ($request->hasFile('photos')) {


            foreach ($request->photos as $photo) {

                $file_name = uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('data/uploads/product'), $file_name);
                $a = $file_name;

                $product->images()->create([
                    'image' => 'data/uploads/product/' . $a,

                ]);
            }
        }

        if ($product) {
            session()->flash('status', 'success');
            session()->flash('title', 'Haber başarıyla eklendi!');
            session()->flash('message',  'Haber sisteme eklendi!');
            return redirect()->route('admin.product.index');
        } else {
            session()->flash('status', 'error');
            session()->flash('title', 'Haber eklenmedi!');
            session()->flash('message', 'Haber eklenirken bir hata oluştu!');
        }
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {

    
        $product_category= ProductCategory::all();
        return view('backoffice.pages.product.edit', (['product' => $product, 'breadcrumb' => $this->breadcrumb,'product_category' =>  $product_category ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // dd($request);
        if ($request->hasFile('image')) {

            $file_name = uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('data/uploads/product'), $file_name);
            $image = $file_name;

            $product->fill([


                'image' => 'data/uploads/product/' . $image,

            ]);
        }




        $product->fill([
            'title' => $request->title,
            'description' => $request->description,
            'cycle' => $request->cycle,
            'type' => $request->type,
            'price' => $request->price,
            'slug' => Str::slug($request->title),

            'category_id' => $request->category_id,

            'sort' => $request->sort,
            'status' => $request->status,

        ]);

        $product->save();

        if ($product) {
            session()->flash('status', 'success');
            session()->flash('title', 'Haber başarıyla güncellendi!');
            session()->flash('message',  'Haber başarıyla güncellendi!');
            return redirect()->route('admin.product.index');
        } else {
            session()->flash('status', 'error');
            session()->flash('title', 'Haber eklenmedi!');
            session()->flash('message', 'Haber eklenirken bir hata oluştu!');
        }

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->delete();
        session()->flash('status', 'success');
        session()->flash('title', 'Başarıyla silindi!');
        session()->flash('message', $product->id . ' numaralı Haber silindi!');
        return redirect()->route('admin.product.index');
    }

 
}

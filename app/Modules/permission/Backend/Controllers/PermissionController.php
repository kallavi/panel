<?php

namespace App\Modules\permission\Backend\Controllers;

use App\Http\Controllers\Controller;
use  DataTables;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function __construct()
    {
        //$this->middleware(['permission:kullanici']);
    }


    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Permission::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '  <div class="col-md-4"> <a href="' . route("admin.permission.delete", $row->id) . '">  <button class="btn btn-sm btn-icon btn-danger"><i class="bi bi-trash fs-3"></i></button>  </a> </div>';

                    return $btn;
                })

                ->rawColumns(['action'])
                ->make(true);
        }
        return view('permission-Backend::index');
    }

    public function delete($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        session()->flash('status', 'success');
        session()->flash('title', 'Başarıyla silindi!');
        session()->flash('message', $permission->id . ' numaralı Birim silindi!');
        return redirect()->route('admin.permission.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('permission-Backend::create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $image = new Permission();
        $permission = new  Permission();


        $permission->name = $request->name;

        $permission->save();

        // if ($request->hasFile('photos')) {
        //     foreach ($request->photos as $photo) {


        //         $file_name = uniqid() . '.' . $photo->getClientOriginalExtension();
        //         $photo->move(public_path('data/uploads/permission'), $file_name);
        //         $photo = $file_name;

        //         $image->create([
        //             'image' =>  $photo
        //         ]);
        //     }
        // }



        if ($permission) {
            session()->flash('status', 'success');
            session()->flash('title', 'İzin başarıyla eklendi!');
            session()->flash('message',  'İzin sisteme eklendi!');
            return redirect()->route('admin.permission.index');
        } else {
            session()->flash('status', 'error');
            session()->flash('title', 'İzin eklenmedi!');
            session()->flash('message', 'İzin eklenirken bir hata oluştu!');
        }
        return redirect()->route('admin.permission.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {



        return view('permission-Backend::edit', (['permission' => $permission, 'role' => $role]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        if ($request->hasFile('image')) {

            $file_name = uniqid() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('data/uploads/permission'), $file_name);
            $image = $file_name;

            $permission->fill([


                'image' => $image,

            ]);
        }
        if ($request->hasFile('thumbnail')) {

            $file_name = uniqid() . '.' . $request->thumbnail->getClientOriginalExtension();
            $request->thumbnail->move(public_path('data/uploads/permission'), $file_name);
            $thumbnail = $file_name;

            $permission->fill([


                'thumbnail' => $thumbnail,

            ]);
        }

        $permission->fill([
            'name' => $request->name,

            'slug' => Str::slug($request->name),
        ]);


        $permission->save();

        if ($permission) {
            session()->flash('status', 'success');
            session()->flash('title', 'İzin başarıyla güncellendi!');
            session()->flash('message',  'İzin başarıyla güncellendi!');
            return redirect()->route('admin.permission.index');
        } else {
            session()->flash('status', 'error');
            session()->flash('title', 'İzin eklenmedi!');
            session()->flash('message', 'İzin eklenirken bir hata oluştu!');
        }

        return redirect()->route('admin.permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {

        $permission->delete();
        session()->flash('status', 'success');
        session()->flash('title', 'Başarıyla silindi!');
        session()->flash('message', $permission->id . ' numaralı İzin silindi!');
        return redirect()->route('admin.permission.index');
    }
}

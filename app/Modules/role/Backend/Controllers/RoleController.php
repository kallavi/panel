<?php

namespace App\Modules\role\Backend\Controllers;

use App\Http\Controllers\Controller;
use  DataTables;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct()
    {
      //  $this->middleware(['permission:kullanici']);
    }
    
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Role::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<div class="col-md-4"> <a class="btn btn-sm btn-icon btn-primary" href="' . route("admin.role.edit", $row->id) . '" title="Güncelle"><i class="bi bi-pencil-square fs-3"></i></a>  </div> <div class="col-md-4"> <a href="' . route("admin.role.delete", $row->id) . '">  <button class="btn btn-sm btn-icon btn-danger"><i class="bi bi-trash fs-3"></i></button>  </a> </div>';


                    return $btn;
                })

                ->rawColumns(['action'])
                ->make(true);
        }
        return view('role-Backend::index');
    }

    public function delete($id)
    {
        $role = Role::find($id);
        $role->delete();
        session()->flash('status', 'success');
        session()->flash('title', 'Başarıyla silindi!');
        session()->flash('message', $role->id . ' numaralı Birim silindi!');
        return redirect()->route('admin.role.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $permission = Permission::all();
        return view('role-Backend::create', (['permission' => $permission]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $role = new  Role();


        $role->name = $request->name;

        $role->save();


        foreach ($request->permission as $item) {
            $role->givePermissionTo($item);
        }



        if ($role) {
            session()->flash('status', 'success');
            session()->flash('title', 'Rol başarıyla eklendi!');
            session()->flash('message',  'Rol sisteme eklendi!');
            return redirect()->route('admin.role.index');
        } else {
            session()->flash('status', 'error');
            session()->flash('title', 'Rol eklenmedi!');
            session()->flash('message', 'Rol eklenirken bir hata oluştu!');
        }
        return redirect()->route('admin.role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permission = Permission::all();
  
 
        return view('role-Backend::edit', (['permission' => $permission, 'role' => $role]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->name = $request->name;

        $role->save();


        // foreach ($request->permission as $item) {
        //     $role->givePermissionTo($item);
        // }
        $role->syncPermissions($request->permission);
   

        if ($role) {
            session()->flash('status', 'success');
            session()->flash('title', 'Rol başarıyla güncellendi!');
            session()->flash('message',  'Rol başarıyla güncellendi!');
            return redirect()->route('admin.role.index');
        } else {
            session()->flash('status', 'error');
            session()->flash('title', 'Rol eklenmedi!');
            session()->flash('message', 'Rol eklenirken bir hata oluştu!');
        }

        return redirect()->route('admin.role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {

        $role->delete();
        session()->flash('status', 'success');
        session()->flash('title', 'Başarıyla silindi!');
        session()->flash('message', $role->id . ' numaralı Rol silindi!');
        return redirect()->route('admin.role.index');
    }
}

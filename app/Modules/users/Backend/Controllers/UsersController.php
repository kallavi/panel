<?php

namespace App\Modules\users\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use  DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Throwable;

class UsersController extends Controller
{

    public function __construct()
    {
        //$this->middleware(['permission:kullanici']);
    }

    // public function index(Request $request)
    // {

    //     if ($request->ajax()) {
    //         $data = User::latest()->get();
    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function ($row) {

    //                 $btn = '<div class="col-md-4"> <a class="btn btn-sm btn-icon btn-primary" href="' . route("admin.users.edit", $row->id) . '" title="Güncelle"><i class="bi bi-pencil-square fs-3"></i></a>  </div> <div class="col-md-4"> <a href="' . route("admin.users.delete", $row->id) . '">  <button class="btn btn-sm btn-icon btn-danger"><i class="bi bi-trash fs-3"></i></button>  </a> </div>';


    //                 return $btn;
    //             })
    //             ->addColumn('created_at', function ($row) {

    //                 $param = ($row->created_at)->format('d/m/Y');


    //                 return $param;
    //             })
    //             ->addColumn('updated_at', function ($row) {

    //                 $param = ($row->updated_at)->format('d/m/Y');


    //                 return $param;
    //             })

    //             ->rawColumns(['action', 'created_at', 'updated_at'])
    //             ->make(true);
    //     }
    //     // dd(view('users-Backend::index'));
    //     return view('users-Backend::index');
    // }

    public function index()
    {
        $users = User::all();
        return view('users-Backend::index', compact('users'));
    }


    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash('status', 'success');
        session()->flash('title', 'Başarıyla silindi!');
        session()->flash('message', $user->id . ' numaralı Birim silindi!');
        return redirect()->route('admin.users.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();

        return view('users-Backend::create', (['role' => $role]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $image = new User();
        $user = new  User();
        if ($request->password) {

            $user->password = Hash::make($request->password);
        }
        $user->email = $request->email;
        $user->name = $request->name;
        // $user->assignRole($request->role);
        $user->save();

        // if ($request->hasFile('photos')) {
        //     foreach ($request->photos as $photo) {


        //         $file_name = uniqid() . '.' . $photo->getClientOriginalExtension();
        //         $photo->move(public_path('data/uploads/user'), $file_name);
        //         $photo = $file_name;

        //         $image->create([
        //             'image' =>  $photo
        //         ]);
        //     }
        // }



        if ($user) {
            session()->flash('status', 'success');
            session()->flash('title', 'Kullanıcı başarıyla eklendi!');
            session()->flash('message',  'Kullanıcı sisteme eklendi!');
            return view('users-Backend::edit', (['user' => $user]));
        } else {
            session()->flash('status', 'error');
            session()->flash('title', 'Kullanıcı eklenmedi!');
            session()->flash('message', 'Kullanıcı eklenirken bir hata oluştu!');
        }
         
        // return redirect()->route('admin.users.index');
        return view('users-Backend::edit', (['user' => $user ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $role = Role::all();

        return view('users-Backend::edit', (['user' => $user, 'role' => $role]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        if ($request->password) {

            $user->password = Hash::make($request->password);
        }
        $user->email = $request->email;
        $user->name = $request->name;
        // $user->syncRoles([$request->role]);
        $user->save();


        if ($user) {
            session()->flash('status', 'success');
            session()->flash('title', 'Kullanıcı başarıyla güncellendi!');
            session()->flash('message',  'Kullanıcı başarıyla güncellendi!');
            return redirect()->route('admin.users.index');
        } else {
            session()->flash('status', 'error');
            session()->flash('title', 'Kullanıcı eklenmedi!');
            session()->flash('message', 'Kullanıcı eklenirken bir hata oluştu!');
        }

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        try {
            $user->delete();
            $status = 'success';
            $message = 'Proje Silindi.';
            return redirect()->route('admin.users.index')->with(['status' => $status, 'message' => $message]);
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('admin.users.index')->with(['status' => $status, 'message' => $message]);
        }
    }
}

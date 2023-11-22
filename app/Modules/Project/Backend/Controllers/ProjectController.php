<?php

namespace App\Modules\Project\Backend\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Project\Backend\Models\Project;
use App\Modules\Project\Backend\Models\ProjectCategory;
use App\Modules\Project\Backend\Models\ProjectGallery;
use Illuminate\Http\Request;
use Throwable;
use DataTables;
class ProjectController extends Controller
{

    // public function index(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $data = Project::latest()->get();
    //         return Datatables::of($data)
    //             ->addIndexColumn()
    //             ->addColumn('action', function ($row) {
    //                 $btn = '<div class="col-md-4"> <a class="btn btn-sm btn-icon btn-primary" href="' . route("projects.edit", $row->id) . '" title="Güncelle"><i class="bi bi-pencil-square fs-3"></i></a>  </div> <div class="col-md-4"> <a href="' . route("admin.projects.delete", $row->id) . '">  <button class="btn btn-sm btn-icon btn-danger"><i class="bi bi-trash fs-3"></i></button>  </a> </div>';
    //                 return $btn;
    //             })
    //             ->rawColumns(['action'])
    //             ->make(true);
    //     }
    //     return view('admin.pages.projects.index');
    // }

    public function index() {
        $projects = Project::all();
        return view('admin.pages.projects.index', compact('projects'));
    }

    public function delete($id)
    {
        $user = Project::find($id);
        $user->delete();
        session()->flash('status', 'success');
        session()->flash('title', 'Başarıyla silindi!');
        session()->flash('message', $user->id . ' numaralı Birim silindi!');
        return redirect()->route('projects.index');
    }



    function store(Request $request) {
        $project = new Project();
        $project->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/projects'), $file_name);
            $image = 'uploads/projects/' . $file_name;
            $project->image = $image;
        }

        $project->save();
        if ($request->hasFile('photos')) {
            foreach ($request->photos as $photo) {
                $file_name = uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('uploads/projects'), $file_name);
                $project->gallery()->create([
                    'slug' => 'uploads/projects/' . $file_name,
                ]);
            }
        }
        return redirect()->route('projects.edit', $project->id);
    }

    public function update(Request $request, Project $project) {
        $project->fill($request->all());
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/projects'), $file_name);
            $image = 'uploads/projects/' . $file_name;
            $project->image = $image;
        }

        try {
            $project->save();
            if ($request->hasFile('photos')) {
                foreach ($request->photos as $photo) {
                    $file_name = uniqid() . '.' . $photo->getClientOriginalExtension();
                    $photo->move(public_path('uploads/projects'), $file_name);
                    $project->gallery()->create([
                        'slug' => 'uploads/projects/' . $file_name,
                    ]);
                }
            }
            $status = 'success';
            $message = 'Proje Güncellendi.';
            return redirect()->route('projects.edit', $project->id)->with( ['status' => $status, 'message' => $message] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('projects.edit', $project->id)->with( ['status' => $status, 'message' => $message] );
        }
    }

    public function galleryDelete(Request $request)
    {

        $projectGallery = ProjectGallery::where('slug', 'uploads/projects/' . $request->slug)->first();
 
        $projectGallery->delete();
        return $projectGallery;
    }

    public function edit(Project $project)
    {
        $projectGallery = Project::with('gallery')->where('id', $project->id)->first();
        $projectCategory = ProjectCategory::all();
        return view('admin.pages.projects.edit', (['project' => $project, 'gallery' => $projectGallery, 'categories' => $projectCategory ]));
    }

    public function create() {
        $categories = ProjectCategory::all();
        return view('admin.pages.projects.create', compact('categories'));
    }

    public function destroy($id) {
        $project = Project::findOrFail($id);
        try {
            $project->delete();
            $status = 'success';
            $message = 'Proje Silindi.';
            return redirect()->route('projects.index')->with( ['status' => $status, 'message' => $message] );
        } catch (Throwable $e) {
            $status = 'danger';
            $message = 'Bir sorun oluştu. Lütfen daha sonra tekrar deneyin..';
            return redirect()->route('projects.index')->with( ['status' => $status, 'message' => $message] );
        }
    }
}

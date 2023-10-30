<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        return view('admin.project.viewProject',[
            'title' => 'Daftar Project',
            'projects' => Project::where('status','0')->get(),
            'slug' => ''
        ]);
    }

    public function viewEdit($id){
        $project = Project::findOrFail($id);
        return view('admin.project.viewEdit',[
            'title' => 'Edit Project',
            'project' => $project,
            'slug' => ''
        ]);
    }

    public function updateProject(Request $request,$id){
        $project = Project::findOrFail($id);
        $data = [
            'nama' => $request->nama,
            'status' => $request->status,
        ];
        $project->update($data);
        return redirect()->back()->withToastSuccess('Data Project berhasil diupdate');
    }

    public function projectDone(){
        return view('admin.project.viewProject',[
            'title' => 'Daftar Project',
            'projects' => Project::where('status','1')->get(),
            'slug' => ''
        ]);
    }
}

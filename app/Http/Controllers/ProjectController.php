<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        if (auth()->user()->role == 1) {
            return view('admin.project.viewProject',[
                'title' => 'Daftar Project',
                'projects' => Project::where('status','0')->get(),
                'slug' => ''
            ]);
        }else{
            return view('karyawan.project.viewProject',[
                'title' => 'Daftar Project',
                'projects' => Project::where('status','0')->get(),
                'slug' => ''
            ]);
        }

    }

    public function viewEdit($id){
        $project = Project::findOrFail($id);
        if (auth()->user()->role == 1) {
            return view('admin.project.viewEdit',[
                'title' => 'Edit Project',
                'project' => $project,
                'slug' => ''
            ]);
        }else{
            return view('karyawan.project.viewEdit',[
                'title' => 'Edit Project',
                'project' => $project,
                'slug' => ''
            ]);
        }
    }

    public function updateProject(Request $request,$id){
        $project = Project::findOrFail($id);
        $data = [
            'nama' => $request->nama,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
        ];
        $project->update($data);
        return redirect()->back()->withToastSuccess('Data Project berhasil diupdate');
    }

    public function projectDone(){
        if (auth()->user()->role == 1) {
            return view('admin.project.viewProject',[
                'title' => 'Daftar Project',
                'projects' => Project::where('status','1')->get(),
                'slug' => ''
            ]);
        }else{
            return view('karyawan.project.viewProject',[
                'title' => 'Daftar Project',
                'projects' => Project::where('status','1')->get(),
                'slug' => ''
            ]);
        }

    }

    public function projectDoneView($id){
        $project = Project::findOrFail($id);
        if (auth()->user()->role == 1) {
            return view('admin.project.viewDone',[
                'title' => 'Edit Project',
                'project' => $project,
                'slug' => ''
            ]);
        }else{
            return view('karyawan.project.viewDone',[
                'title' => 'Edit Project',
                'project' => $project,
                'slug' => ''
            ]);
        }
    }
}

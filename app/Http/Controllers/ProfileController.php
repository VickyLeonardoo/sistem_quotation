<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function viewProfile(){
        $profile = Cv::first();
        return view('admin.profile.viewProfile',[
            'title' => 'Profile CV',
            'slug' => '',
            'cv' => $profile,
        ]);
    }

    public function simpanProfile(Request $request){
        $request->validate([
            'nama' => 'required',
            'email'=> 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'alamat' => 'required',
        ],
        [
            'nama.required' => 'Nama Wajib Diisi',
            'email.required'=> 'Email Wajib Diisi',
            'kota.required' => 'Kota Wajib Diisi',
            'provinsi.required' => 'Provinsi Wajib Diisi',
            'alamat.required' => 'Alamat Wajib Diisi',
        ]);

        $data = request()->except(['_token']);
        Cv::where('id','1')->update($data);
        return redirect()->back()->withToastSuccess('Provile CV Berhasil Diupdate');
    }
}

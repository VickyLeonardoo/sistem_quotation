<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function viewKaryawan(){
        $karyawan = User::where('role','2')->get();
        return view('admin.karyawan.viewKaryawan',[
            'title' => 'Daftar Karyawan',
            'slug' => '',
            'karyawan' => $karyawan,
        ]);
    }

    public function viewTambahKaryawan(){
        return view('admin.karyawan.viewTambahKaryawan',[
            'title' => 'Tambah Karyawan',
            'slug' => ''
        ]);
    }

    public function simpanKaryawan(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ],
        [
            'name.required' => 'Nama Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => 2,
            'password' => bcrypt('12345')
        ];

        User::create($data);
        return redirect()->back()->withToastSuccess('Data Karyawan Berhasil Ditambahkan');
    }

    public function viewEditKaryawan($id){
        $user = User::find($id);
        return view('admin.karyawan.viewEditKaryawan',[
            'title' => 'Edit Karyawan '.$user->name,
            'slug' => $id,
            'user' => $user,
        ]);
    }

    public function updateKaryawan(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ],
        [
            'name.required' => 'Nama Wajib Diisi',
            'email.required' => 'Email Wajib Diisi',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        User::find($id)->update($data);
        return redirect()->back()->withToastSuccess('Data Karyawan Berhasil Diubah');
    }

    public function resetPassword($id){
        $data = [
            'password' => bcrypt('12345'),
        ];
        User::find($id)->update($data);
        return redirect()->back()->withToastSuccess('Password Berhasil Direset');

    }
}

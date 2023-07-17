<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerusahaanController extends Controller
{
    public function viewPerusahaan(){
        $perusahaan = Perusahaan::all();
        if (Auth::guard('user')->user()->role == 1) {
            return view('admin.perusahaan.viewPerusahaan',[
                'title' => 'Data Perusahaan',
                'perusahaan' => $perusahaan,
                'slug' => ''
            ]);
        }else{
            return view('karyawan.perusahaan.viewPerusahaan',[
                'title' => 'Data Perusahaan',
                'perusahaan' => $perusahaan,
                'slug' => ''
            ]);
        }
    }

    public function viewTambahPerusahaan(){
        if (Auth::guard('user')->user()->role == 1) {
            return view('admin.perusahaan.viewTambahPerusahaan',[
                'title' => 'Tambah Data Perusahaan',
                'slug' => '',

            ]);
        }else{
            return view('karyawan.perusahaan.viewTambahPerusahaan',[
                'title' => 'Tambah Data Perusahaan',
                'slug' => '',

            ]);
        }
    }

    public function simpanPerusahaan(Request $request){
        $str = strtolower(Request()->namaPerusahaan);
        $slug =  preg_replace('/\s+/', '-', $str);

        $data = $request->all();
        request()->validate([
            'kodePerusahaan' => 'required|unique:perusahaans,kodePerusahaan',
            'namaPerusahaan' => 'required',
            'alamatPerusahaan' => 'required',
            'emailPerusahaan' => 'required',
            'telpPerusahaan' => 'required',
            'picPerusahaan' => 'required',
            'slug' => 'unique:perusahaans,slug'
        ],
        [
            'kodePerusahaan.required' => 'Kode Wajib Diisi',
            'kodePerusahaan.unique' => 'Kode Perusahaan Sudah ada',
            'namaPerusahaan.required' => 'Nama Perusahaan Wajib Diisi',
            'alamatPerusahaan.required' => 'Alamat Perusahaan Wajib Diisi',
            'emailPerusahaan.required' => 'Email Perusahaan Wajib Diisi',
            'telpPerusahaan.required' => 'Telpon Wajib Diisi',
            'picPerusahaan.required' => 'PIC Wajib Diisi',
        ]);

        Perusahaan::create($data + ['slug' => $slug]);
        return redirect()->back()->withToastSuccess('Data Perusahaan berhasil ditambahkan');
    }

    public function viewEditPerusahaan($slug){
        $perusahaan = Perusahaan::where('slug',$slug)->first();
        if (Auth::guard('user')->user()->role == 1) {
            return view('admin.perusahaan.viewEditPerusahaan',[
                'title' => 'Edit Data perusahaan',
                'perusahaan' => $perusahaan,
                'slug' => $slug
            ]);
        }else{
            return view('karyawan.perusahaan.viewEditPerusahaan',[
                'title' => 'Edit Data perusahaan',
                'perusahaan' => $perusahaan,
                'slug' => $slug
            ]);
        }

    }

    public function updatePerusahaan(Request $request, $slug){
        $perusahaan = Perusahaan::where('slug',$slug)->first();
        $id = $perusahaan->id;
        $str = strtolower(Request()->namaPerusahaan);
        $slug = preg_replace('/\s+/', '-', $str);
        $data = request()->except(['_token']);

        Perusahaan::where('id',$id)->update($data + ['slug' => $slug]);
        if (Auth::guard('user')->user()->role == 1) {
            return redirect()->route('perusahaan.edit',$slug)->withToastSuccess('Data Produk Berhasil Ditambahkan');
        }else{
            return redirect()->route('karyawan.perusahaan.edit',$slug)->withToastSuccess('Data Produk Berhasil Ditambahkan');
        }
    }

}

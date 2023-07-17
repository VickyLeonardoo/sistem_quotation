<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function viewProduk(){
        return view('admin.produk.viewProduk',[
            'title' => 'Daftar Produk',
            'produk' => Produk::all(),
            'slug' => '',
        ]);
    }

    public function viewTambahProduk(){
        return view('admin.produk.viewTambahProduk',[
            'title' => 'Tambah Data Produk',
            'slug' => '',

        ]);
    }

    public function simpanProduk(Request $request){
        $str = strtolower(Request()->kodeProduk.'-'.Request()->namaProduk);
        request()->validate([
            'kodeProduk' => 'required|unique:produks,kodeProduk',
            'namaProduk' => 'required',
            'hargaProduk' => 'required',
            'slug' => 'unique:produks,slug'
        ],
        [
            'kodeProduk.required' => 'Kode Produk Wajib Diisi',
            'kodeProduk.unique' => 'Kode Produk Sudah Ada',
            'namaProduk.required' => 'Nama Produk Wajib Diisi',
            'hargaProduk.required' => 'Harga Produk Wajib Diisi',
        ]);
        $data = [
            'kodeProduk' => $request->kodeProduk,
            'namaProduk' => $request->namaProduk,
            'hargaProduk' => $request->hargaProduk,
            'slug' => preg_replace('/\s+/', '-', $str),

        ];
        Produk::create($data);
        return redirect()->back()->withToastSuccess('Data Produk Berhasil Ditambahkan');
    }

    public function viewEditProduk($slug){
        $produk = Produk::where('slug',$slug)->first();
        return view('admin.produk.viewEditProduk',[
            'title' => 'Edit Data Produk',
            'produks' => $produk,
            'slug' => $slug,
        ]);
    }

    public function updateProduk(Request $request, $slug){
        $produk = Produk::where('slug',$slug)->first();
        $id = $produk->id;
        $str = strtolower(Request()->kodeProduk.'-'.Request()->namaProduk);
        $slug = preg_replace('/\s+/', '-', $str);
        $data = [
            'kodeProduk' => $request->kodeProduk,
            'namaProduk' => $request->namaProduk,
            'hargaProduk' => $request->hargaProduk,
            'slug' => preg_replace('/\s+/', '-', $str),
        ];
        Produk::where('id',$id)->update($data);
        return redirect()->route('produk.edit',$slug)->withToastSuccess('Data Produk Berhasil Ditambahkan');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function simpanLog(Request $request, $id){
        $data = $request->validate([
            'persentase' => 'required',
            'deskripsi' => 'required',
            'tglPekerjaan' => 'required',
        ],[
            'persentase.required' => 'Persentase Wajib Diisi',
            'deskripsi.required' => 'Deskripsi Wajib Diisi',
            'tglPekerjaan.required' => 'Tanggal Wajib Diisi',
        ]);
        $data['project_id'] = $id;
        Log::create($data);
        return redirect()->back()->withToastSuccess('Tambah data Log Pekerjaan berhasil');
    }
}

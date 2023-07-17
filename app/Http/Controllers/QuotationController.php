<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\Produk;
use Carbon\Carbon;use App\Models\Perusahaan;
use App\Helpers\Helper;

class QuotationController extends Controller
{
    public function viewDraftQuotation(){
        $quotaion = Quotation::where('status','Menunggu Konfirmasi')->get();
        return view('admin.quotation.viewQuotationDraft',[
            'title' => 'Daftar Quotation',
            'slug' => '',
            'quotation' => $quotaion,
        ]);
    }

    public function viewTambahDraftQuotation(){
        $perusahaan = Perusahaan::all();
        $produk = Produk::all();
        try {
            $quotation = Quotation::latest()->firstOrFail();
            $quotationId = $quotation->id + 1;
        } catch (\Throwable $e) {
            $quotationId = 1;
        }
        $currentMonth = Carbon::now()->formatLocalized('%b');
        $currentYear = Carbon::now()->format('Y');
        $quotationNo = "QTO/{$quotationId}/{$currentMonth}/{$currentYear}";


        return view('admin.quotation.viewTambahQuotation',[
            'title' => 'Daftar Quotation',
            'slug' => '',
            'perusahaan' => $perusahaan,
            'qtoNo' => $quotationNo,
            'produk' => $produk,
        ]);
    }

    public function simpanDraftQuotation(Request $request){
        $validatedData = $request->validate([
            'perusahaan_id' => 'required',
            'quotation_no' => 'required',
            'tglQuotation' => 'required',
            'produk_id' => 'required|array',
            'produk_id.*' => 'exists:produks,id',
            'quantity' => 'required|array',
        ]);
        // return $validatedData;

        // Simpan data ke dalam tabel Quotation
        $quotation = new Quotation();
        $quotation->perusahaan_id = $validatedData['perusahaan_id'];
        $quotation->quotationNo = $validatedData['quotation_no'];
        $quotation->tglQuotation = $validatedData['tglQuotation'];
        $quotation->save();

        // Simpan data ke dalam tabel pivot (many-to-many) dengan menghitung total
        $total = 0;
        for ($i = 0; $i < count($validatedData['produk_id']); $i++) {
            $product = Produk::find($validatedData['produk_id'][$i]);
            $quantity = $validatedData['quantity'][$i];

            $quotation->produk()->attach($product->id, ['quantity' => $quantity]);
            $total += $product->hargaProduk * $quantity;
        }

        // Simpan total ke dalam atribut total pada model Quotation
        $quotation->total = $total;
        $quotation->save();
        return redirect()->route('menu.quotation')->withToastSuccess('Quotation Berhasil Dibuat');
    }

    public function viewDraftQuotationPerusahaan($id){
        $qto = Quotation::where('id',$id)->first();
        $total = $qto->total;
        $terbilang = Helper::terbilang($total);
        return view('admin.quotation.viewQuotationDraftPerusahaan',[
            'title' => 'View Quotation Perusahaan',
            'slug' => $id,
            'qto' => $qto,
            'terbilang' => $terbilang,
        ]);
    }

    public function viewConfirmedQuotationPerusahaan($id){
        $qto = Quotation::where('id',$id)->first();
        $total = $qto->total;
        $terbilang = Helper::terbilang($total);

        return view('admin.quotation.viewQuotationConfirmedPerusahaan',[
            'title' => 'View Quotation Perusahaan',
            'slug' => $id,
            'qto' => $qto,
            'terbilang' => $terbilang,
        ]);
    }

    public function viewQuotationPrint($id){
        $qto = Quotation::where('id',$id)->first();
        return view('admin.quotation.viewQuotationPrint',[
            'title' => 'View Quotation Perusahaan',
            'slug' => $id,
            'qto' => $qto,
        ]);
    }

    public function hapusDraftQuotation($id){
        $quotation = Quotation::find($id);
        $quotation->produk()->detach();
        $quotation->delete();
        return redirect()->back()->withToastSuccess('Data Berhasil Dihapus');
    }

    public function konfirmasiQuotation($id){
        $quotation = Quotation::find($id);
        $quotation->update(['status' =>'Konfirmasi']);
        return redirect()->back()->withToastSuccess('Berhasil Dikonfirmasi');
    }

    public function tolakQuotation($id){
        $quotation = Quotation::find($id);
        $quotation->update(['status' =>'Ditolak']);
        return redirect()->route('menu.quotation')->withToastSuccess('Berhasil Ditolak');

    }

    public function viewConfirmedtQuotation(){
        $quotaion = Quotation::where('status','Konfirmasi')->get();
        return view('admin.quotation.viewQuotationConfirmed',[
            'title' => 'Daftar Quotation',
            'slug' => '',
            'quotation' => $quotaion,
        ]);
    }

    // public function viewQuotation(){
    //     $nowDate = Carbon::now();
    //     $quotation = new Quotation();
    //     $quotation->perusahaan_id = '1';
    //     $quotation->quotationNo = '3';
    //     $quotation->tglQuotation = $nowDate;
    //     $quotation->total = '100000';

    //     $quotation->save();

    //     $product1 = Produk::find(1);
    //     $product2 = Produk::find(2);

    //     $quotation->produk()->attach([
    //         $product1->id => ['quantity' => 2],
    //         $product2->id => ['quantity' => 3],
    //     ]);
    // }

    // public function getQuotation(){
    //     $quotation = Quotation::find(3);

        // foreach ($quotation->produk as $product) {
        //     echo $product->namaProduk.','.$product->hargaProduk.'<br>';;
        // }
    // }


}

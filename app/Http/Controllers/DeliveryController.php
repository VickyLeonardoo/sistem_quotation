<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DeliveryController extends Controller
{
    public function index(){
        $deliveries = Delivery::where('status','Menunggu Konfirmasi')->get();
        return view('admin.delivery.index',[
            'title' => 'Delivery Order',
            'slug' => '',
            'deliveries' => $deliveries,
        ]);
    }

    public function viewTambah(){
        $deliveryId = False;

        try {
            $delivery = Delivery::latest()->firstOrFail();
            $deliveryId = $invoice->id + 1;
        } catch (\Throwable $e) {
            $deliveryId = 1;
        }
        $currentMonth = Carbon::now()->formatLocalized('%b');
        $currentYear = Carbon::now()->format('Y');
        $deliveryNo = "DO/{$deliveryId}/{$currentMonth}/{$currentYear}";
        $invoices = Invoice::where('status', 'Konfirmasi')->get();
        return view('admin.delivery.viewTambahDo',[
            'title' => 'Tambah Delivery Order',
            'slug' => '',
            'invoices' => $invoices,
            'deliveryNo' => $deliveryNo,
        ]);
    }

    public function simpanDo(Request $request){
        $data = $request->validate([
            'deliveryNo' => 'required',
            'invoice_id' => 'required',
            'tglDelivery' => 'required',
        ],[
            'deliveryNo.required' => 'Delivery No Wajib Diisi',
            'invoice_id.required' => 'Invoice Wajib Diisi',
            'tglDelivery.required' => 'Tanggal Wajib Diisi',
        ]);

        Delivery::create($data);
        return redirect()->route('menu.draft.do')->withToastSuccess('Delivery Order Berhasil Dibuat');
    }

    public function viewFormDo($id){
        return view('admin.delivery.viewFormDo',[
            'title' => 'Formulir Delivery Order',
            'slug' => '',
            'delivery' => Delivery::findOrFail($id),
        ]);
    }

    public function updateFormDo($id){
        $delivery = Delivery::findOrFail($id);
        $delivery->update(['status' => 'Konfirmasi']);
        return redirect()->route('menu.draft.do')->withToastSuccess('Form DO Berhasil Di Konfirmasi');
    }

    public function viewConfirm(){
        $deliveries = Delivery::where('status','Konfirmasi')->get();
        return view('admin.delivery.index',[
            'title' => 'Delivery Order',
            'slug' => '',
            'deliveries' => $deliveries,
        ]);
    }
}

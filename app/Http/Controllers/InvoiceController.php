<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Produk;
use App\Models\Invoice;
use App\Models\Quotation;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Helpers\Helper;

class InvoiceController extends Controller
{
    public function viewDraftInvoice(){
        $invoice = Invoice::where('status','Menunggu Konfirmasi')->get();
        return view('admin.invoice.viewDraftInvoice',[
            'title' => 'Draft Invoice',
            'slug' => '',
            'invoice' => $invoice,
        ]);
    }

    public function viewTambahDraftInvoice(){
        $perusahaan = Perusahaan::all();
        $quotation = Quotation::where('is_invoice', false)->where('status','Konfirmasi')->get();

        try {
            $invoice = Invoice::latest()->firstOrFail();
            $invoiceId = $invoice->id + 1;
        } catch (\Throwable $e) {
            $invoiceId = 1;
        }
        $currentMonth = Carbon::now()->formatLocalized('%b');
        $currentYear = Carbon::now()->format('Y');
        $invoiceNo = "INV/{$invoiceId}/{$currentMonth}/{$currentYear}";

        return view('admin.invoice.viewTambahInvoice',[
            'title' => 'Daftar Quotation',
            'slug' => '',
            'perusahaan' => $perusahaan,
            'invNo' => $invoiceNo,
            'qto' => $quotation,

        ]);
    }

    public function simpanInvoice(Request $request){
        $validatedData = $request->validate([
            'quotation_id' => 'required',
            'invoiceNo' => 'required',
            'tglInvoice' => 'required',
        ],
        [
            'quotation_id.required' => 'Quotation No Wajib Diisi',
            'tglQuotation.required' => 'Tanggal Wajib Diisi',
            'payment_due.required' => 'Batas Pembayaran Wajib Diisi',
        ]);

        $tglInvoice = Carbon::parse($validatedData['tglInvoice']);
        $paymentDue = $tglInvoice->addDays($request->payment_due);
        $validatedData['payment_due'] = $paymentDue;
        $qtoId = $request->quotation_id;
        Quotation::where('id',$qtoId)->update(['is_invoice' => true]);
        Invoice::create($validatedData);
        return redirect()->route('menu.draft.invoice')->withToastSuccess('Invoice Berhasil Dibuat');
    }

    public function viewConfirmedInvoicePerusahaan($id){
        $invoice = Invoice::where('id',$id)->first();
        $total = $invoice->quotation->total;
        $terbilang = Helper::terbilang($total);
        return view('admin.invoice.viewInvoiceConfirmedPerusahaan',[
            'title' => 'Invoice',
            'slug' => $id,
            'inv' => $invoice,
            'terbilang' => $terbilang,
        ]);
    }

    public function viewInvoicePerusahaan($id){
        $invoice = Invoice::where('id',$id)->first();
        $total = $invoice->quotation->total;
        $terbilang = Helper::terbilang($total);
        return view('admin.invoice.viewInvoiceDraftPerusahaan',[
            'title' => 'Invoice',
            'slug' => $id,
            'inv' => $invoice,
            'terbilang' => $terbilang,
        ]);
    }

    public function konfirmasiInvoice($id){
        $invoice = Invoice::find($id);
        $invoice->update(['status' =>'Konfirmasi']);
        return redirect()->back()->withToastSuccess('Berhasil Dikonfirmasi');
    }

    public function tolakInvoice($id){
        $invoice = Invoice::find($id);
        $invoice->update(['status' =>'Ditolak']);
        return redirect()->route('menu.draft.invoice')->withToastSuccess('Berhasil Ditolak');
    }

    public function viewInvoicePrint($id){
        $invoice = Invoice::where('id',$id)->first();
        $total = $invoice->quotation->total;
        $terbilang = Helper::terbilang($total);
        return view('admin.invoice.viewInvoicePrint',[
            'title' => 'Invoice',
            'slug' => $id,
            'inv' => $invoice,
            'terbilang' => $terbilang,
        ]);
    }

    public function viewConfirmedtInvoice(){
        $invoice = Invoice::where('status', 'Konfirmasi')->get();
        return view('admin.invoice.viewInvoiceConfirmed',[
            'title' => 'Confirmed Invoice',
            'slug' => '',
            'inv' => $invoice,
        ]);
    }


}

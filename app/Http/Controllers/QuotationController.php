<?php

namespace App\Http\Controllers;

use PDF;
use Dompdf\Dompdf;
use App\Models\User;
use App\Mail\QtoMail;
use App\Models\Produk;
use App\Helpers\Helper;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;use App\Models\Perusahaan;

class QuotationController extends Controller
{
    public function viewDraftQuotation(){
        $status = 'Menunggu Konfirmasi';
        $quotation = Quotation::with(['produk', 'perusahaan'])->where('status', $status)->get();
        $role = Auth::guard('user')->user()->role;
        $viewData = [
            'title' => 'Daftar Quotation',
            'slug' => '',
            'quotation' => $quotation,
        ];
        $view = ($role == 1) ? 'admin.quotation.viewQuotationDraft' : 'karyawan.quotation.viewQuotationDraft';
        return view($view, $viewData);
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

        $role = Auth::guard('user')->user()->role;
        $viewData = [
            'title' => 'Daftar Quotation',
            'slug' => '',
            'perusahaan' => $perusahaan,
            'qtoNo' => $quotationNo,
            'produk' => $produk,
        ];

        $view = ($role == 1) ? 'admin.quotation.viewTambahQuotation' : 'karyawan.quotation.viewTambahQuotation';
        return view($view, $viewData);
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
        $user = User::where('role' , '1')->first();
        $email = $user->email;
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
        Mail::to($email)->send(new QtoMail($validatedData));
        $route = (Auth::guard('user')->user()->role == 1) ? 'menu.quotation' : 'karyawan.menu.quotation';
        return redirect()->route($route)->withToastSuccess('Quotation Berhasil Dibuat');
    }

    public function viewDraftQuotationPerusahaan($id){
        $qto = Quotation::where('id', $id)->first();
        $total = $qto->total;
        $terbilang = Helper::terbilang($total);
        $role = Auth::guard('user')->user()->role;
        $viewData = [
            'title' => 'View Quotation Perusahaan',
            'slug' => $id,
            'qto' => $qto,
            'terbilang' => $terbilang,
        ];
        $view = ($role == 1) ? 'admin.quotation.viewQuotationDraftPerusahaan' : 'karyawan.quotation.viewQuotationDraftPerusahaan';
        return view($view, $viewData);
    }


    public function viewConfirmedQuotationPerusahaan($id){
        $qto = Quotation::where('id', $id)->first();
        $total = $qto->total;
        $terbilang = Helper::terbilang($total);
        $role = Auth::guard('user')->user()->role;
        $viewData = [
            'title' => 'View Quotation Perusahaan',
            'slug' => $id,
            'qto' => $qto,
            'terbilang' => $terbilang,
        ];
        $view = ($role == 1) ? 'admin.quotation.viewQuotationConfirmedPerusahaan' : 'karyawan.quotation.viewQuotationConfirmedPerusahaan';
        return view($view, $viewData);
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
        $quotation = Quotation::where('status', 'Konfirmasi')->get();
        $role = Auth::guard()->user()->role;
        $viewData = [
            'title' => 'Daftar Quotation',
            'slug' => '',
            'quotation' => $quotation,
        ];
        $view = ($role == 1) ? 'admin.quotation.viewQuotationConfirmed' : 'karyawan.quotation.viewQuotationConfirmed';
        return view($view, $viewData);
    }

    // public function sendMail($id){
    //     $qto = Quotation::find($id);
    //     $total = $qto->total;
    //     $terbilang = Helper::terbilang($total);

    //     $pdf = \PDF::loadView('email.pdf_mail', compact('qto','terbilang'))->setOptions(['defaultFont' => 'sans-serif']);
    //     $email = $qto->perusahaan->emailPerusahaan;

    //     Mail::send('email.pdf_mail', ['qto' => $qto, 'terbilang' => $terbilang], function ($message) use ($qto, $pdf) {
    //         $email = $qto->perusahaan->emailPerusahaan;
    //         if (!empty($email)) {
    //             $message->to($email)
    //                 ->subject('Quotation')
    //                 ->attachData($pdf->output(), "test.pdf");
    //         }
    //     });
    //     return 'sukses';
    // }

    public function sendMail($id){
        // Generate PDF from Blade template
        $qto = Quotation::find($id);
        $total = $qto->total;
        $terbilang = Helper::terbilang($total);

        $dompdf = new Dompdf();
        $html = view('email.pdf_mail', ['qto' => $qto, 'terbilang' => $terbilang])->render();
        $dompdf->loadHtml($html);
        $dompdf->render();
        $output = $dompdf->output();

        // Save PDF to temporary file
        $pdfPath = public_path('temp.pdf');
        file_put_contents($pdfPath, $output);

        // Send email with the PDF attachment
        $email = 'vickyleonardo00@gmail.com'; // Email recipient
        Mail::send('email.pdf_mail', ['qto' => $qto, 'terbilang' => $terbilang], function ($message) use ($email, $pdfPath, $qto) {
            $message->to($email)
                ->subject('Subject of the email')
                ->attach($pdfPath);
        });

        // Delete the temporary PDF file
        unlink($pdfPath);
    }

}

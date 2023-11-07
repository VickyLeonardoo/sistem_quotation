<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
{
    public function index(){
        return view('admin.archive.index',[
            'title' => 'Arsip',
            'slug' => ''
        ]);
    }

    public function viewArchiveQuotation(){
        $years = Quotation::select(DB::raw('YEAR(tglQuotation) as year'))
                ->distinct()
                ->orderBy('year', 'desc')
                ->get();

        return view('admin.archive.quotation.viewQuotation',[
            'title' => 'Archive Quotation',
            'slug' => '',
            'years' => $years,
        ]);
    }

    public function viewArchiveQuotationYear($year){
        $quotations = Quotation::whereYear('tglQuotation', $year)->where('status','2')->get();
        return view('admin.archive.quotation.viewQuotationYear',[
            'title' => 'Quotation Tahun ' .$year,
            'slug' => '',
            'quotations' => $quotations,
        ]);
    }

    public function viewArchiveInvoice(){
        $years = Invoice::select(DB::raw('YEAR(tglInvoice) as year'))
                ->distinct()
                ->orderBy('year', 'desc')
                ->get();

        return view('admin.archive.invoice.viewInvoice',[
            'title' => 'Archive Invoice',
            'slug' => '',
            'years' => $years,
        ]);
    }

    public function viewArchiveInvoiceYear($year){
        $inv = Invoice::whereYear('tglInvoice', $year)->where('status', 'Konfirmasi')->get();
        return view('admin.archive.invoice.viewInvoiceYear',[
            'title' => 'Quotation Tahun ' .$year,
            'slug' => '',
            'inv' => $inv,
        ]);
    }
}

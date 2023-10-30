<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\PerusahaanController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/web', function () {
    return view('web');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::post('/proses-login',[Authcontroller::class,'prosesLogin']);
Route::get('/logout',[AuthController::class,'logout'])->name('login');

Route::group(['middleware' => ['auth:user']],function(){
    Route::group(['middleware' => ['cek_login:1']],function(){
        // CV Profile
        Route::GET('/home',[HomeController::class,'index'])->name('viewHome');
        Route::GET('/profile',[ProfileController::class,'viewProfile']);
        Route::POST('/simpan-profile',[ProfileController::class,'simpanProfile']);
        //Produk
        Route::GET('/master-data/produk',[ProdukController::class,'viewProduk']);
        Route::GET('/master-data/produk/tambah-data',[ProdukController::class,'viewTambahProduk']);
        Route::GET('/master-data/produk/edit/{slug}',[ProdukController::class,'viewEditProduk'])->name('produk.edit');
        Route::POST('/master-data/produk/simpan-produk',[ProdukController::class,'simpanProduk']);
        Route::POST('/master-data/produk/update-produk-{slug}',[ProdukController::class,'updateProduk']);
        //Perusahaan
        Route::GET('/master-data/perusahaan',[PerusahaanController::class,'viewPerusahaan']);
        Route::GET('/master-data/perusahaan/tambah-data',[PerusahaanController::class,'viewTambahPerusahaan']);
        Route::POST('/master-data/perusahaan/simpan-perusahaan',[PerusahaanController::class,'simpanPerusahaan']);
        Route::GET('/master-data/perusahaan/edit/{slug}',[PerusahaanController::class,'viewEditPerusahaan'])->name('perusahaan.edit');
        Route::POST('/master-data/perusahaan/update-perusahaan-{slug}',[PerusahaanController::class,'updatePerusahaan']);
        //Quotation Draft
        Route::GET('/menu/draft-quotation',[QuotationController::class,'viewDraftQuotation'])->name('menu.quotation');
        Route::GET('/menu/draft-quotation/tambah-data',[QuotationController::class,'viewTambahDraftQuotation']);
        // Route::GET('/menu/draft-quotation/get',[QuotationController::class,'getQuotation']);
        Route::POST('/menu/draft-quotation/simpan-produk',[QuotationController::class,'simpanDraftQuotation']);
        Route::GET('/menu/draft-quotation/view-quotation/{id}',[QuotationController::class,'viewDraftQuotationPerusahaan']);
        Route::GET('/menu/draft-quotation/hapus-quotation/{id}',[QuotationController::class,'hapusDraftQuotation']);
        Route::GET('/menu/draft-quotation/view-quotation-print/{id}',[QuotationController::class,'viewQuotationPrint']);
        Route::GET('/menu/draft-quotation/view-quotation/konfirmasi/{id}',[QuotationController::class,'konfirmasiQuotation']);
        Route::GET('/menu/draft-quotation/view-quotation/tolak/{id}',[QuotationController::class,'tolakQuotation']);
        Route::GET('/menu/draft-quotation/email-quotation/{id}',[QuotationController::class,'sendMail']);

        //Quotation Confirmed
        Route::GET('/menu/confirmed-quotation',[QuotationController::class,'viewConfirmedtQuotation'])->name('menu.confirmed.quotation');
        Route::GET('/menu/confirmed-quotation/view-quotation/{id}',[QuotationController::class,'viewConfirmedQuotationPerusahaan']);

        //Ongoing Project
        Route::GET('/menu/project/ongoing',[ProjectController::class,'index'])->name('menu.project.ongoing');
        Route::GET('/menu/project/ongoing/edit/{id}',[ProjectController::class,'viewEdit'])->name('menu.project.ongoing.edit');
        Route::POST('/menu/project/ongoing/update/{id}',[ProjectController::class,'updateProject'])->name('menu.project.ongoing.update');

        Route::GET('/menu/project/done',[ProjectController::class,'projectDone'])->name('menu.project.done');



        //Invoice Draft
        Route::GET('/menu/draft-invoice',[InvoiceController::class,'viewDraftInvoice'])->name('menu.draft.invoice');
        Route::GET('/menu/draft-invoice/tambah-data',[InvoiceController::class,'viewTambahDraftInvoice']);
        Route::POST('/menu/draft-invoice/simpan-invoice',[InvoiceController::class,'simpanInvoice']);
        Route::GET('/menu/draft-invoice/view-invoice/{id}',[InvoiceController::class,'viewInvoicePerusahaan'])->name('menu.invoice.view');
        Route::GET('/menu/draft-invoice/view-invoice-print/{id}',[InvoiceController::class,'viewInvoicePrint']);
        Route::GET('/menu/draft-invoice/view-invoice/konfirmasi/{id}',[InvoiceController::class,'konfirmasiInvoice']);
        Route::GET('/menu/draft-invoice/view-invoice/tolak/{id}',[InvoiceController::class,'tolakInvoice']);
        //Confirmed Invoice
        Route::GET('/menu/confirmed-invoice',[InvoiceController::class,'viewConfirmedtInvoice'])->name('menu.confirmed.invoice');
        Route::GET('/menu/confirmed-invoice/view-invoice/{id}',[InvoiceController::class,'viewConfirmedInvoicePerusahaan']);
        //Karyawan
        Route::GET('/master-data/karyawan',[KaryawanController::class,'viewKaryawan']);
        Route::GET('/master-data/karyawan/tambah-data',[KaryawanController::class,'viewTambahKaryawan']);
        Route::POST('/master-data/karyawan/simpan-karyawan',[KaryawanController::class,'simpanKaryawan']);
        Route::GET('/master-data/karyawan/edit/{id}',[KaryawanController::class,'viewEditKaryawan'])->name('karyawan.edit');
        Route::POST('/master-data/karyawan/update/{id}',[KaryawanController::class,'updateKaryawan']);
        Route::GET('/master-data/karyawan/reset-password/{id}',[KaryawanController::class,'resetPassword']);

    });
});

Route::group(['middleware' => ['auth:user']],function(){
    Route::group(['middleware' => ['cek_login:2']],function(){
        Route::GET('/karyawan/home',[HomeController::class,'index'])->name('karyawan.home');

        // //Quotation Draft
        // Route::GET('/karyawan/menu/draft-quotation',[QuotationController::class,'viewDraftQuotation'])->name('karyawan.menu.quotation');
        // Route::GET('/karyawan/menu/draft-quotation/tambah-data',[QuotationController::class,'viewTambahDraftQuotation']);
        // Route::POST('/karyawan/menu/draft-quotation/simpan-produk',[QuotationController::class,'simpanDraftQuotation']);
        // Route::GET('/karyawan/menu/draft-quotation/view-quotation/{id}',[QuotationController::class,'viewDraftQuotationPerusahaan']);
        // Route::GET('/karyawan/menu/draft-quotation/hapus-quotation/{id}',[QuotationController::class,'hapusDraftQuotation']);
        // Route::GET('/karyawan/menu/draft-quotation/view-quotation-print/{id}',[QuotationController::class,'viewQuotationPrint']);

        Route::GET('/karyawan/menu/confirmed-quotation',[QuotationController::class,'viewConfirmedtQuotation'])->name('karyawan.menu.confirmed.quotation');
        // Route::GET('/karyawan/menu/confirmed-quotation/view-quotation/{id}',[QuotationController::class,'viewConfirmedQuotationPerusahaan']);

        // //Invoice Draft
        // Route::GET('/karyawan/menu/draft-invoice',[InvoiceController::class,'viewDraftInvoice'])->name('karyawan.menu.draft.invoice');
        // Route::GET('/karyawan/menu/draft-invoice/tambah-data',[InvoiceController::class,'viewTambahDraftInvoice']);
        // Route::POST('/karyawan/menu/draft-invoice/simpan-invoice',[InvoiceController::class,'simpanInvoice']);
        // Route::GET('/karyawan/menu/draft-invoice/view-invoice/{id}',[InvoiceController::class,'viewInvoicePerusahaan'])->name('karyawan.menu.invoice.view');
        // Route::GET('/karyawan/menu/draft-invoice/view-invoice-print/{id}',[InvoiceController::class,'viewInvoicePrint']);
        // //Confirmed Invoice
        // Route::GET('/karyawan/menu/confirmed-invoice',[InvoiceController::class,'viewConfirmedtInvoice'])->name('karyawan.menu.confirmed.invoice');
        // Route::GET('/karyawan/menu/confirmed-invoice/view-invoice/{id}',[InvoiceController::class,'viewConfirmedInvoicePerusahaan']);

        //Email PDF
        Route::GET('/karyawan/menu/email-quotation/{id}',[QuotationController::class,'sendMail']);

    });
});

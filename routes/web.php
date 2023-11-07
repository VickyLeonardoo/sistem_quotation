<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\DeliveryController;
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
        Route::get('/home',[HomeController::class,'index'])->name('viewHome');
        Route::get('/profile',[ProfileController::class,'viewProfile']);
        Route::post('/simpan-profile',[ProfileController::class,'simpanProfile']);
        //Produk
        Route::get('/master-data/produk',[ProdukController::class,'viewProduk']);
        Route::get('/master-data/produk/tambah-data',[ProdukController::class,'viewTambahProduk']);
        Route::get('/master-data/produk/edit/{slug}',[ProdukController::class,'viewEditProduk'])->name('produk.edit');
        Route::post('/master-data/produk/simpan-produk',[ProdukController::class,'simpanProduk']);
        Route::post('/master-data/produk/update-produk-{slug}',[ProdukController::class,'updateProduk']);
        //Perusahaan
        Route::get('/master-data/perusahaan',[PerusahaanController::class,'viewPerusahaan']);
        Route::get('/master-data/perusahaan/tambah-data',[PerusahaanController::class,'viewTambahPerusahaan']);
        Route::post('/master-data/perusahaan/simpan-perusahaan',[PerusahaanController::class,'simpanPerusahaan']);
        Route::get('/master-data/perusahaan/edit/{slug}',[PerusahaanController::class,'viewEditPerusahaan'])->name('perusahaan.edit');
        Route::post('/master-data/perusahaan/update-perusahaan-{slug}',[PerusahaanController::class,'updatePerusahaan']);
        //Quotation Draft
        Route::get('/menu/draft-quotation',[QuotationController::class,'viewDraftQuotation'])->name('menu.quotation');
        Route::get('/menu/draft-quotation/tambah-data',[QuotationController::class,'viewTambahDraftQuotation']);
        // Route::get('/menu/draft-quotation/get',[QuotationController::class,'getQuotation']);
        Route::post('/menu/draft-quotation/simpan-produk',[QuotationController::class,'simpanDraftQuotation']);
        Route::get('/menu/draft-quotation/view-quotation/{id}',[QuotationController::class,'viewDraftQuotationPerusahaan']);
        Route::get('/menu/draft-quotation/hapus-quotation/{id}',[QuotationController::class,'hapusDraftQuotation']);
        Route::get('/menu/draft-quotation/view-quotation-print/{id}',[QuotationController::class,'viewQuotationPrint']);
        Route::get('/menu/draft-quotation/view-quotation/konfirmasi/{id}',[QuotationController::class,'konfirmasiQuotation']);
        Route::get('/menu/draft-quotation/view-quotation/tolak/{id}',[QuotationController::class,'tolakQuotation']);
        Route::get('/menu/draft-quotation/email-quotation/{id}',[QuotationController::class,'sendMail']);

        //Quotation Confirmed
        Route::get('/menu/confirmed-quotation',[QuotationController::class,'viewConfirmedtQuotation'])->name('menu.confirmed.quotation');
        Route::get('/menu/confirmed-quotation/view-quotation/{id}',[QuotationController::class,'viewConfirmedQuotationPerusahaan']);

        //Ongoing Project
        Route::get('/menu/project/ongoing',[ProjectController::class,'index'])->name('menu.project.ongoing');
        Route::get('/menu/project/ongoing/edit/{id}',[ProjectController::class,'viewEdit'])->name('menu.project.ongoing.edit');
        Route::post('/menu/project/ongoing/update/{id}',[ProjectController::class,'updateProject'])->name('menu.project.ongoing.update');

        Route::get('/menu/project/done',[ProjectController::class,'projectDone'])->name('menu.project.done');
        Route::get('/menu/project/done/{id}/view',[ProjectController::class,'projectDoneView']);


        //Invoice Draft
        Route::get('/menu/draft-invoice',[InvoiceController::class,'viewDraftInvoice'])->name('menu.draft.invoice');
        Route::get('/menu/draft-invoice/tambah-data',[InvoiceController::class,'viewTambahDraftInvoice']);
        Route::post('/menu/draft-invoice/simpan-invoice',[InvoiceController::class,'simpanInvoice']);
        Route::get('/menu/draft-invoice/view-invoice/{id}',[InvoiceController::class,'viewInvoicePerusahaan'])->name('menu.invoice.view');
        Route::get('/menu/draft-invoice/view-invoice-print/{id}',[InvoiceController::class,'viewInvoicePrint']);
        Route::get('/menu/draft-invoice/view-invoice/konfirmasi/{id}',[InvoiceController::class,'konfirmasiInvoice']);
        Route::get('/menu/draft-invoice/view-invoice/tolak/{id}',[InvoiceController::class,'tolakInvoice']);
        //Confirmed Invoice
        Route::get('/menu/confirmed-invoice',[InvoiceController::class,'viewConfirmedtInvoice'])->name('menu.confirmed.invoice');
        Route::get('/menu/confirmed-invoice/view-invoice/{id}',[InvoiceController::class,'viewConfirmedInvoicePerusahaan']);

        //Delivery Oder
        Route::get('/menu/draft-delivery-order',[DeliveryController::class,'index'])->name('menu.draft.do');
        Route::get('/menu/draft-delivery-order/tambah-data',[DeliveryController::class,'viewTambah'])->name('menu.draft.do.tambah');
        Route::post('/menu/draft-delivery-order/simpan',[DeliveryController::class,'simpanDo'])->name('menu.draft.do.simpan');
        Route::get('/menu/draft-delivery-order/view-do-{id}',[DeliveryController::class,'viewFormDo'])->name('menu.draft.do.view.form');
        Route::get('/menu/draft-delivery-order/do-{id}/konfirmasi',[DeliveryController::class,'updateFormDo'])->name('menu.draft.do.update.form');


        Route::get('/menu/confirmed-delivery-order',[DeliveryController::class,'viewConfirm'])->name('menu.draft.do');

        //Arsip
        Route::get('/menu/archive',[ArchiveController::class,'index'])->name('menu.archive');

        Route::get('/menu/archive/quotation',[ArchiveController::class,'viewArchiveQuotation'])->name('menu.archive.quotation');
        Route::get('/menu/archive/quotation/year-{year}',[ArchiveController::class,'viewArchiveQuotationYear'])->name('menu.archive.quotation');

        Route::get('/menu/archive/invoice',[ArchiveController::class,'viewArchiveInvoice'])->name('menu.archive.invoice');
        Route::get('/menu/archive/invoice/year-{year}',[ArchiveController::class,'viewArchiveInvoiceYear'])->name('menu.archive.invoice');

        //Karyawan
        Route::get('/master-data/karyawan',[KaryawanController::class,'viewKaryawan']);
        Route::get('/master-data/karyawan/tambah-data',[KaryawanController::class,'viewTambahKaryawan']);
        Route::post('/master-data/karyawan/simpan-karyawan',[KaryawanController::class,'simpanKaryawan']);
        Route::get('/master-data/karyawan/edit/{id}',[KaryawanController::class,'viewEditKaryawan'])->name('karyawan.edit');
        Route::post('/master-data/karyawan/update/{id}',[KaryawanController::class,'updateKaryawan']);
        Route::get('/master-data/karyawan/reset-password/{id}',[KaryawanController::class,'resetPassword']);


    });
});

Route::group(['middleware' => ['auth:user']],function(){
    Route::group(['middleware' => ['cek_login:2']],function(){
        Route::get('/karyawan/home',[HomeController::class,'index'])->name('karyawan.home');

        // //Quotation Draft
        // Route::get('/karyawan/menu/draft-quotation',[QuotationController::class,'viewDraftQuotation'])->name('karyawan.menu.quotation');
        // Route::get('/karyawan/menu/draft-quotation/tambah-data',[QuotationController::class,'viewTambahDraftQuotation']);
        // Route::post('/karyawan/menu/draft-quotation/simpan-produk',[QuotationController::class,'simpanDraftQuotation']);
        // Route::get('/karyawan/menu/draft-quotation/view-quotation/{id}',[QuotationController::class,'viewDraftQuotationPerusahaan']);
        // Route::get('/karyawan/menu/draft-quotation/hapus-quotation/{id}',[QuotationController::class,'hapusDraftQuotation']);
        // Route::get('/karyawan/menu/draft-quotation/view-quotation-print/{id}',[QuotationController::class,'viewQuotationPrint']);

        Route::get('/karyawan/menu/confirmed-quotation',[QuotationController::class,'viewConfirmedtQuotation'])->name('karyawan.menu.confirmed.quotation');
        Route::get('/karyawan/menu/confirmed-quotation/view-quotation/{id}',[QuotationController::class,'viewConfirmedQuotationPerusahaan']);



        Route::get('/karyawan/menu/project/ongoing',[ProjectController::class,'index'])->name('karyawan.menu.project.ongoing');
        Route::get('/karyawan/menu/project/ongoing/edit/{id}',[ProjectController::class,'viewEdit'])->name('karyawan.menu.project.ongoing.edit');
        Route::post('/karyawan/menu/project/ongoing/update/{id}',[ProjectController::class,'updateProject'])->name('karyawan.menu.project.ongoing.update');
        Route::get('/karyawan/menu/project/done',[ProjectController::class,'projectDone'])->name('karyawan.menu.project.done');
        Route::get('/karyawan/menu/project/done/{id}/view',[ProjectController::class,'projectDoneView']);

        Route::post('/karyawan/menu/project/{id}/simpan-log',[LogController::class,'simpanLog'])->name('karyawan.menu.project.simpan.log');
        // //Invoice Draft
        // Route::get('/karyawan/menu/draft-invoice',[InvoiceController::class,'viewDraftInvoice'])->name('karyawan.menu.draft.invoice');
        // Route::get('/karyawan/menu/draft-invoice/tambah-data',[InvoiceController::class,'viewTambahDraftInvoice']);
        // Route::post('/karyawan/menu/draft-invoice/simpan-invoice',[InvoiceController::class,'simpanInvoice']);
        // Route::get('/karyawan/menu/draft-invoice/view-invoice/{id}',[InvoiceController::class,'viewInvoicePerusahaan'])->name('karyawan.menu.invoice.view');
        // Route::get('/karyawan/menu/draft-invoice/view-invoice-print/{id}',[InvoiceController::class,'viewInvoicePrint']);
        // //Confirmed Invoice
        // Route::get('/karyawan/menu/confirmed-invoice',[InvoiceController::class,'viewConfirmedtInvoice'])->name('karyawan.menu.confirmed.invoice');
        // Route::get('/karyawan/menu/confirmed-invoice/view-invoice/{id}',[InvoiceController::class,'viewConfirmedInvoicePerusahaan']);

        //Email PDF
        Route::get('/karyawan/menu/email-quotation/{id}',[QuotationController::class,'sendMail']);

    });
});

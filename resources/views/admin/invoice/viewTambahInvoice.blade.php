@extends('partials.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <a href="/menu/draft-invoice" class="btn btn-primary">Kembali</a>
                    <form action="/menu/draft-invoice/simpan-invoice" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Quotation No</label>
                            <select name="quotation_id" class="form-control" id="">
                                @foreach ($qto as $data)
                                    <option value="{{ $data->id }}">{{ $data->quotationNo }} - {{ $data->perusahaan->namaPerusahaan }} - {{ Carbon\Carbon::parse($data->tglQuotation)->format('d-M-Y') }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Invoice No</label>
                            <input type="text" readonly class="form-control" name="invoiceNo" placeholder="Masukkan Email Perusahaan" value="{{ $invNo }}">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="text"  class="form-control" name="tglInvoice" placeholder="Masukkan Tanggal" onfocus="(this.type='date')"onblur="(this.type='text')">
                        </div>
                        <div class="form-group">
                            <label for="">Batas Pembayaran</label>
                            <select name="payment_due" class="form-control" >
                                <option value="15">15 Hari</option>
                                <option value="30">30 Hari</option>
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label for="">Produk</label>
                            <div id="produk-container">
                                <div class="input-group mb-2">
                                    <select name="produk_id[]" class="form-control">
                                        @foreach ($produk as $data)
                                            <option value="{{ $data->id }}">{{ $data->kodeProduk }} - {{ $data->namaProduk }}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append col-4">
                                        <input type="number" name="quantity[]" class="form-control" placeholder="Quantity">
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary tambah-produk" type="button">Tambah Produk</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-info" value="Simpan" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

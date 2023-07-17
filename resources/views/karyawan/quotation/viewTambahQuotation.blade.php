@extends('partials.karyawan.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <a href="/karyawan/menu/draft-quotation" class="btn btn-primary">Kembali</a>
                    <form action="/karyawan/menu/draft-quotation/simpan-produk" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Perusahaan</label>
                            <select name="perusahaan_id" class="form-control" id="">
                                @foreach ($perusahaan as $data)
                                    <option value="{{ $data->id }}">{{ $data->kodePerusahaan }} - {{ $data->namaPerusahaan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Quotation No</label>
                            <input type="text" readonly class="form-control" name="quotation_no" placeholder="Masukkan Email Perusahaan" value="{{ $qtoNo }}">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal</label>
                            <input type="text"  class="form-control" name="tglQuotation" placeholder="Masukkan Tanggal" onfocus="(this.type='date')"onblur="(this.type='text')">
                        </div>
                        <div class="form-group">
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
                        </div>
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

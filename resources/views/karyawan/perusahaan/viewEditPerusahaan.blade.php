@extends('partials.karyawan.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <a href="/karyawan/master-data/perusahaan" class="btn btn-primary">Kembali</a>
                    <form action="/karyawan/master-data/perusahaan/update-perusahaan-{{ $perusahaan->slug }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Perusahaan</label>
                            <input type="text" class="form-control" name="kodePerusahaan" value="{{ $perusahaan->kodePerusahaan }}" placeholder="Masukkan Nama Produk">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Perusahaan</label>
                            <input type="text" class="form-control" name="namaPerusahaan" value="{{ $perusahaan->namaPerusahaan }}" placeholder="Masukkan Nama Produk">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Perusahaan</label>
                            <input type="text" class="form-control" name="emailPerusahaan" value="{{ $perusahaan->alamatPerusahaan }}" placeholder="Masukkan Nama Produk">
                        </div>
                        <div class="form-group">
                            <label for="">Email Perusahaan</label>
                            <input type="text" class="form-control" name="emailPerusahaan" value="{{ $perusahaan->emailPerusahaan }}" placeholder="Masukkan Nama Produk">
                        </div>
                        <div class="form-group">
                            <label for="">Telp Perusahaan</label>
                            <input type="text" class="form-control" name="telpPerusahaan" value="{{ $perusahaan->telpPerusahaan }}" placeholder="Masukkan Nama Produk">
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

@extends('partials.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <a href="/master-data/perusahaan" class="btn btn-primary">Kembali</a>
                    <form action="/master-data/perusahaan/simpan-perusahaan" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Perusahaan</label>
                            <input type="text" class="form-control" name="kodePerusahaan" placeholder="Masukkan Kode Perusahaan" value="{{ old('kodePerusahaan') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Perusahaan</label>
                            <input type="text" class="form-control" name="namaPerusahaan" placeholder="Masukkan Nama Perusahaan" value="{{ old('namaPerusahaan') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Email Perusahaan</label>
                            <input type="text" class="form-control" name="emailPerusahaan" placeholder="Masukkan Email Perusahaan" value="{{ old('emailPerusahaan') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Perusahaan</label>
                            <input type="text" class="form-control" name="alamatPerusahaan" placeholder="Masukkan Alamat Perusahaan" value="{{ old('alamatPerusahaan') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Telp Perusahaan</label>
                            <input type="text" class="form-control" name="telpPerusahaan" placeholder="Masukkan Telpon Perusahaan" value="{{ old('telpPerusahaan') }}">
                        </div>
                        <div class="form-group">
                            <label for="">PIC Perusahaan</label>
                            <input type="text" class="form-control" name="picPerusahaan" placeholder="Masukkan PIC Perusahaan" value="{{ old('picPerusahaan') }}">
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

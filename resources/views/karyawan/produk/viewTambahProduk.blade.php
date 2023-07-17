@extends('partials.karyawan.header')

@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <a href="/karyawan/master-data/produk" class="btn btn-primary">Kembali</a>
                    <form action="/karyawan/master-data/produk/simpan-produk" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Produk</label>
                            <input type="text" class="form-control" name="kodeProduk" placeholder="Masukkan Nama Produk" value="{{ old('kodeProduk') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input type="text" class="form-control" name="namaProduk" placeholder="Masukkan Nama Produk" value="{{ old('namaProduk') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="text" class="form-control" name="hargaProduk" placeholder="Masukkan Nama Produk" value="{{ old('hargaProduk') }}">
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

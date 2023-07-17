@extends('partials.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <a href="/master-data/produk" class="btn btn-primary">Kembali</a>
                    <form action="/master-data/produk/update-produk-{{ $produks->slug }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Kode Produk</label>
                            <input type="text" class="form-control" name="kodeProduk" value="{{ $produks->kodeProduk }}" placeholder="Masukkan Nama Produk">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Produk</label>
                            <input type="text" class="form-control" name="namaProduk" value="{{ $produks->namaProduk }}" placeholder="Masukkan Nama Produk">
                        </div>
                        <div class="form-group">
                            <label for="">Harga</label>
                            <input type="number" class="form-control" name="hargaProduk" value="{{ $produks->hargaProduk }}" placeholder="Masukkan Nama Produk">
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

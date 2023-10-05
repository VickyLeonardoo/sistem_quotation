@extends('partials.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <a href="/master-data/karyawan" class="btn btn-primary">Kembali</a>
                    <form action="/master-data/karyawan/simpan-karyawan" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Produk" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Masukkan Nama Produk" value="{{ old('email') }}">
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

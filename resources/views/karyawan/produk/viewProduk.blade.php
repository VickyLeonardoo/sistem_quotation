@extends('partials.karyawan.header')

@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Daftar Produk</div>
                    <div class="card-category"></div>
                    <a href="/karyawan/master-data/produk/tambah-data" class="btn btn-primary">Tambah Produk</a><br><br>
                    <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $data)
                            <tr>
                                <td>{{ $data->kodeProduk }}</td>
                                <td>{{ $data->namaProduk }}</td>
                                <td>@currency($data->hargaProduk) </td>
                                <td>
                                    <a href="/karyawan/master-data/produk/edit/{{ $data->slug }}" class="btn btn-info"><i class="fas fa-edit"></i>Edit</a>
                                    <a href="/karyawan/master-data/produk/hapus-{{ $data->slug }}" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('partials.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Daftar Karyawan</div>
                    <div class="card-category"></div>
                    <a href="/master-data/karyawan/tambah-data" class="btn btn-primary">Tambah Karyawan</a><br><br>
                    <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($karyawan as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>
                                    <a href="/master-data/karyawan/edit/{{ $data->id }}" class="btn btn-info"><i class="fas fa-edit"></i>Edit</a>
                                    <a href="/master-data/karyawan/reset-password/{{ $data->id }}" class="btn btn-primary"><i class="fas fa-key"></i></a>
                                    {{-- <a href="/menu/draft-quotation/hapus-quotation/{{ $data->id }}" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
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

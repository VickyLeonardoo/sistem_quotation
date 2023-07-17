@extends('partials.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Daftar Perusahaan</div>
                    <div class="card-category"></div>
                    <a href="/master-data/perusahaan/tambah-data" class="btn btn-primary">Tambah Perusahaan</a><br><br>
                    <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode Perusahaan</th>
                            <th>Nama Perusahaan</th>
                            <th>Alamat Perusahaan</th>
                            <th>Email Perusahaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perusahaan as $data)
                            <tr>
                                <td>{{ $data->kodePerusahaan }}</td>
                                <td>{{ $data->namaPerusahaan }}</td>
                                <td>{{ $data->emailPerusahaan }}</td>
                                <td>{{ $data->emailPerusahaan }}</td>
                                <td>
                                    <a href="/master-data/perusahaan/edit/{{ $data->slug }}" class="btn btn-info"><i class="fas fa-edit"></i>Edit</a>
                                    <a href="/master-data/perusahaan/hapus-{{ $data->slug }}" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Kode Perusahaan</th>
                            <th>Nama Perusahaan</th>
                            <th>Alamat Perusahaan</th>
                            <th>Email Perusahaan</th>
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

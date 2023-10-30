@extends('partials.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Daftar Project</div>
                    <div class="card-category"></div>
                    <a href="/master-data/produk/tambah-data" class="btn btn-primary">Tambah Project</a><br><br>
                    <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Kode Produk</th>
                            <th>Quotation No</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $project->quotation->quotationNo }}</td>
                            <td>
                                @if ($project->status == 0)
                                    <small class="badge bg-info text-light">Dalam Pengerjaan</small>
                                @else
                                    <small class="badge bg-success text-light">Selesai Pengerjaan</small>
                                @endif
                            </td>
                            <td>
                                @if ($project->status == 0)
                                    <a href="/menu/project/ongoing/edit/{{ $project->id }}" class="btn btn-info">Edit</a>
                                @else
                                    <a href="" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                                @endif

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

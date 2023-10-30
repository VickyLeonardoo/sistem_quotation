@extends('partials.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Daftar Perusahaan</div>
                    <div class="card-category"></div>
                    <a href="/menu/draft-quotation/tambah-data" class="btn btn-primary">Tambah Quotation</a><br><br>
                    <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No Quotation Perusahaan</th>
                            <th>Nama Perusahaan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quotation as $data)
                            <tr>
                                <td>{{ $data->quotationNo }}</td>
                                <td>{{ $data->perusahaan->namaPerusahaan }}</td>
                                <td>{{ Carbon\Carbon::parse($data->tglQuotation)->format('d-M-Y') }}</td>
                                <td>
                                    @if ($data->status == 0)
                                        <div class="badge bg-warning text-light">Draft</div>
                                    @elseif ($data->status == 1)
                                        <div class="badge bg-info text-light">Email</div>
                                    @else
                                        <div class="badge bg-success text-light">Confirmed</div>
                                    @endif
                                </td>
                                <td>
                                    <a href="/menu/confirmed-quotation/view-quotation/{{ $data->id }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    {{-- <a href="/master-data/perusahaan/edit/{{ $data->slug }}" class="btn btn-info"><i class="fas fa-edit"></i>Edit</a> --}}
                                    {{-- <a href="/menu/draft-quotation/hapus-quotation/{{ $data->id }}" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No Quotation</th>
                            <th>Nama Perusahaan</th>
                            <th>Tanggal</th>
                            <th>Status</th>
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

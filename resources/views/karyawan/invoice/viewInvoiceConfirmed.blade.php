@extends('partials.karyawan.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Daftar Perusahaan</div>
                    <div class="card-category"></div>
                    <a href="/karyawan/menu/draft-invoice/tambah-data" class="btn btn-primary">Tambah Invoice</a><br><br>
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
                        @foreach ($inv as $data)
                            <tr>
                                <td>{{ $data->invoiceNo }}</td>
                                <td>{{ $data->quotation->perusahaan->namaPerusahaan }}</td>
                                <td>{{ Carbon\Carbon::parse($data->tglQuotation)->format('d-M-Y') }}</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    <a href="/karyawan/menu/confirmed-invoice/view-invoice/{{ $data->id }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                    {{-- <a href="/master-data/perusahaan/edit/{{ $data->slug }}" class="btn btn-info"><i class="fas fa-edit"></i>Edit</a> --}}
                                    {{-- <a href="/karyawan/menu/draft-quotation/hapus-quotation/{{ $data->id }}" class="btn btn-danger"><i class="fas fa-trash"></i>Hapus</a> --}}
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

@extends('partials.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Daftar Delivery Order</div>
                    <div class="card-category"></div>
                    <a href="/menu/draft-delivery-order/tambah-data" class="btn btn-primary">Tambah Delivery Order</a><br><br>
                    <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nomor Delivery</th>
                            <th>Nomor Invoice</th>
                            <th>Nama Perusahaan</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deliveries as $delivery)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $delivery->deliveryNo }}</td>
                            <td>{{ $delivery->invoice->invoiceNo }}</td>
                            <td>{{ $delivery->invoice->quotation->perusahaan->namaPerusahaan }}</td>
                            <td>{{ $delivery->status }}</td>
                            <td>
                                <a href="/menu/draft-delivery-order/view-do-{{ $delivery->id }}" class="btn-sm btn-primary"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

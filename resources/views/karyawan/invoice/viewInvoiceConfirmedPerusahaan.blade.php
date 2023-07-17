@extends('partials.karyawan.header')
@section('content')
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="content-wrapper mt-5">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Quotation</h1>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="invoice p-3 mb-3">
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="/karyawan/menu/draft-invoice/view-invoice-print/{{ $inv->id }}" target="_blank" class="btn btn-primary"><i class="fas fa-print"></i> Print</a ><br><br>
                                                    Status: <button href="#" class="btn-success">Konfirmasi</button ><br><br>
                                                    <h4>
                                                    <i class="fas fa-globe"></i>
                                                    <small class="float-right">Date: {{ Carbon\Carbon::parse($inv->tglQuotation)->format('d-M-Y') }}</small>
                                                </h4>
                                            </div>
                                        </div>

                                        <div class="row invoice-info">
                                            <div class="col-sm-4 invoice-col">
                                                From
                                                <address>
                                                    <strong>CV Gabril Mitra Perkasa.</strong><br />
                                                    Komp, Jl. Ruko GMP No.6, Tj. Piayu<br />
                                                    Kec. Sei Beduk, Kota Batam<br />
                                                    Kepulauan Riau 29433<br />
                                                    Phone:  0812-6756-7765<br />
                                                    Email: admin@gabrilmitraperkasa.com
                                                </address>
                                            </div>

                                            <div class="col-sm-4 invoice-col">
                                                To
                                                <address>
                                                    <strong>{{ $inv->quotation->perusahaan->picPerusahaan }}</strong><br />
                                                    {{ $inv->quotation->perusahaan->alamatPerusahaan }}<br />
                                                    {{-- San Francisco, CA 94107<br /> --}}
                                                    Phone: {{ $inv->quotation->perusahaan->telpPerusahaan }}<br />
                                                    Email: {{ $inv->quotation->perusahaan->emailPerusahaan }}

                                                </address>
                                            </div>

                                            <div class="col-sm-4 invoice-col">
                                                <b>Invoice: {{ $inv->invoiceNo }}</b><br />
                                                <b>Payment Due: {{ Carbon\Carbon::parse($inv->payment_due)->format('d-M-Y') }}</b><br />
                                                <br />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Qty</th>
                                                            <th>Description</th>
                                                            <th>Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($inv->quotation->produk as $data)
                                                            <tr>
                                                                <td>{{ $data->pivot->quantity }}</td>
                                                                <td>{{ $data->namaProduk }}</td>
                                                                <td>@currency($data->hargaProduk) </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">

                                               <h4><b>{{ $terbilang }} rupiah.</b> </h4>
                                                </p>
                                            </div>

                                            <div class="col-6">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <th>Total:</th>
                                                            <td>@currency($inv->quotation->total)</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection

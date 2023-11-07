@extends('partials.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="page-pretitle">
                                        Delivery Order
                                    </h6>
                                    <h4 class="page-title">Delivery #{{ $delivery->deliveryNo }}</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card card-invoice">
                                        <div class="text-right mr-5">
                                                <h3 class="invoice-title">
                                                    Delivery Order
                                                </h3>
                                                <div class="invoice-logo">
                                                </div>
                                            <div class="invoice-desc">
                                                Batam, Kepulauan Riau, Indonesia<br />
                                                CV Gabril Mitra Perkasa<br />
                                                Fax 621113
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="separator-solid"></div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-4 info-invoice">
                                                    <h5 class="sub" style="font-weight: bold">Date</h5>
                                                    <p>{{ \Carbon\Carbon::parse($delivery->tglDelivery )->isoFormat('D MMMM Y')}}</p>
                                                </div>
                                                <div class="col-md-4 info-invoice">
                                                    <h5 class="sub">Invoice No</h5>
                                                    <p>#{{ $delivery->invoice->invoiceNo }}</p>
                                                </div>
                                                <div class="col-md-4 info-invoice">
                                                    <h5 class="sub">Delivery To</h5>
                                                    <p>
                                                        {{ $delivery->invoice->quotation->perusahaan->picPerusahaan }}, 1234 Main, Apt. 4B<br />Springfield, ST 54321
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="invoice-detail">
                                                        <div class="invoice-top">
                                                            <h3 class="title"><strong>Order summary</strong></h3>
                                                        </div>
                                                        <div class="invoice-item">
                                                            <div class="table-responsive">
                                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <td><strong>Item</strong></td>
                                                                            <td ><strong>Quantity</strong></td>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($delivery->invoice->quotation->produk as $item)
                                                                            <tr>
                                                                                <td>{{ $item->namaProduk }}</td>
                                                                                <td>{{ $item->pivot->quantity }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                        {{-- @foreach ($qto->produk as $data)
                                                                            <tr>
                                                                                <td>{{ $data->pivot->quantity }}</td>
                                                                                <td>{{ $data->namaProduk }}</td>
                                                                                <td>@currency($data->hargaProduk) </td>
                                                                            </tr>
                                                                        @endforeach --}}
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="separator-solid  mb-3"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="separator-solid"></div>
                                            <h6 class="text-uppercase mt-4 mb-3 fw-bold">
                                                Notes
                                            </h6>
                                            <p class="text-muted mb-0">
                                                We really appreciate your business and if there's anything else we can do, please
                                                let us know! Also, should you need us to add VAT or anything else to this order,
                                                it's super easy since this is a template, so just ask!
                                            </p>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="/menu/draft-delivery-order/do-{{ $delivery->id }}/konfirmasi" class="btn btn-success">Konfirmasi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="page-inner">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-9">
            <div class="row align-items-center">
                <div class="col">
                    <h6 class="page-pretitle">
                        Payments
                    </h6>
                    <h4 class="page-title">Invoice #FDS9876KD</h4>
                </div>
                <div class="col-auto">
                    <a href="#" class="btn btn-light btn-border">
                        Download
                    </a>
                    <a href="#" class="btn btn-primary ml-2">
                        Pay
                    </a>
                </div>
            </div>
            <div class="page-divider"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-invoice">
                        <div class="card-header">
                            <div class="invoice-header">
                                <h3 class="invoice-title">
                                    Invoice
                                </h3>
                                <div class="invoice-logo">
                                    <img src="../assets/img/examples/logoinvoice.svg" alt="company logo">
                                </div>
                            </div>
                            <div class="invoice-desc">
                                Bandung, West Java, Indonesia<br />
                                Fax 621113
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="separator-solid"></div>
                            <div class="row">
                                <div class="col-md-4 info-invoice">
                                    <h5 class="sub">Date</h5>
                                    <p>Dec 21, 2017</p>
                                </div>
                                <div class="col-md-4 info-invoice">
                                    <h5 class="sub">Invoice ID</h5>
                                    <p>#FDS9876KD</p>
                                </div>
                                <div class="col-md-4 info-invoice">
                                    <h5 class="sub">Invoice To</h5>
                                    <p>
                                        Jane Smith, 1234 Main, Apt. 4B<br />Springfield, ST 54321
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="invoice-detail">
                                        <div class="invoice-top">
                                            <h3 class="title"><strong>Order summary</strong></h3>
                                        </div>
                                        <div class="invoice-item">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <td><strong>Item</strong></td>
                                                            <td class="text-center"><strong>Price</strong></td>
                                                            <td class="text-center"><strong>Quantity</strong></td>
                                                            <td class="text-right"><strong>Totals</strong></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>BS-200</td>
                                                            <td class="text-center">$10.99</td>
                                                            <td class="text-center">1</td>
                                                            <td class="text-right">$10.99</td>
                                                        </tr>
                                                        <tr>
                                                            <td>BS-400</td>
                                                            <td class="text-center">$20.00</td>
                                                            <td class="text-center">3</td>
                                                            <td class="text-right">$60.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>BS-1000</td>
                                                            <td class="text-center">$600.00</td>
                                                            <td class="text-center">1</td>
                                                            <td class="text-right">$600.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="text-center"><strong>Subtotal</strong></td>
                                                            <td class="text-right">$670.99</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="text-center"><strong>Shipping</strong></td>
                                                            <td class="text-right">$15</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td class="text-center"><strong>Total</strong></td>
                                                            <td class="text-right">$685.99</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="separator-solid  mb-3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-7 col-md-5 mb-3 mb-md-0 transfer-to">
                                    <h5 class="sub">Bank Transfer</h5>
                                    <div class="account-transfer">
                                        <div><span>Account Name:</span><span>Syamsuddin</span></div>
                                        <div><span>Account Number:</span><span>1234567890934</span></div>
                                        <div><span>Code:</span><span>BARC0032UK</span></div>
                                    </div>
                                </div>
                                <div class="col-sm-5 col-md-7 transfer-total">
                                    <h5 class="sub">Total Amount</h5>
                                    <div class="price">$685.99</div>
                                    <span>Taxes Included</span>
                                </div>
                            </div>
                            <div class="separator-solid"></div>
                            <h6 class="text-uppercase mt-4 mb-3 fw-bold">
                                Notes
                            </h6>
                            <p class="text-muted mb-0">
                                We really appreciate your business and if there's anything else we can do, please
                                let us know! Also, should you need us to add VAT or anything else to this order,
                                it's super easy since this is a template, so just ask!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection

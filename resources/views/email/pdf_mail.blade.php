<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print Quotation</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/adminlte.min.css?v=3.2.0">

</head>

<body>
    <div class="wrapper">
        <section class="invoice">
            <div class="row">
                <div class="col-12">
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
                        <strong>{{ $qto->perusahaan->picPerusahaan }}</strong><br />
                        {{ $qto->perusahaan->alamatPerusahaan }}<br />
                        {{-- San Francisco, CA 94107<br /> --}}
                        Phone: {{ $qto->perusahaan->telpPerusahaan }}<br />
                        Email: {{ $qto->perusahaan->emailPerusahaan }}

                    </address>
                </div>

                <div class="col-sm-4 invoice-col">
                    <b>Quotation: {{ $qto->quotationNo }}</b><br />
                    <b>Tanggal: {{ Carbon\Carbon::parse($qto->tglQuotation)->format('d-M-Y') }}</b><br />


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
                            @foreach ($qto->produk as $data)
                                <tr>
                                    <td>{{ $data->pivot->quantity }}</td>
                                    <td>{{ $data->namaProduk }}</td>
                                    <td>@currency($data->hargaProduk) </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Total</th>
                                <th>@currency($qto->total)</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

            <div class="row">

                <div class="col-6">
                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">

                    </p>
                </div>
            </div>

        </section>

    </div>
</body>

</html>

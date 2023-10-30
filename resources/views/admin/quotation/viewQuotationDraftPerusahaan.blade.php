@extends('partials.header')
@section('content')
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card-body">
                    <div class="content-wrapper mt-5">
                        <section class="content-header">
                            <div class="container-fluid">
                                <a href="{{ url('menu/draft-quotation') }}"
                                    class="btn btn-primary float-right">Kembali</a><br><br>
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
                                                <div class="col-sm-10">
                                                    <a href="/menu/draft-quotation/view-quotation-print/{{ $qto->id }}"
                                                        target="_blank" class="btn btn-primary"><i class="fas fa-print"></i>
                                                        Print</a><br><br>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="/menu/draft-quotation/email-quotation/{{ $qto->id }}"
                                                        class="btn btn-success form-control" id="email-button"
                                                        onclick="sendEmail(event)"
                                                        style="display: inline-block; width: auto; padding: 5px 10px;">
                                                        <i class="fas fa-envelope"></i> Email
                                                    </a>
                                                    <div id="email-loader" style="display: none;">
                                                        Loading...
                                                    </div>
                                                    <br><br>
                                                    @if ($qto->status == '1')
                                                        <button href="#" class="btn-info">Email
                                                            Terkirim</button><br><br>
                                                    @elseif ($qto->status == '0')
                                                        <button href="#" class="btn-danger">Menunggu
                                                            Konfirmasi</button><br><br>
                                                    @endif

                                                    <h4>
                                                        <small>Date:
                                                            {{ Carbon\Carbon::parse($qto->tglQuotation)->format('d-M-Y') }}</small>
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
                                                        Phone: 0812-6756-7765<br />
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
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">

                                                    {{ $terbilang }}.
                                                    </p>
                                                </div>

                                                <div class="col-6">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr>
                                                                <th>Total:</th>
                                                                <td>@currency($qto->total)</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($qto->status != '2')
                                                <a href="/menu/draft-quotation/view-quotation/konfirmasi/{{ $qto->id }}"
                                                    class="btn btn-info"></i>Konfirmasi</a>
                                                <a href="/menu/draft-quotation/view-quotation/tolak/{{ $qto->id }}"
                                                    class="btn btn-danger"></i>Tolak</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function sendEmail(event) {
            var emailButton = document.getElementById('email-button');
            var emailLoader = document.getElementById('email-loader');

            // Sembunyikan tombol Email saat tombol diklik
            emailButton.style.display = 'none';

            // Tampilkan loader saat tombol diklik
            emailLoader.style.display = 'block';

            // Cek apakah email sudah dikirim sebelumnya
            var isEmailSent = {{ $qto->is_email == true ? 'true' : 'false' }};

            if (isEmailSent) {
                var confirmResend = confirm("Email sudah pernah dikirim. Apakah Anda ingin mengirim email kembali?");
                if (!confirmResend) {
                    // Batal mengirim email
                    emailButton.style.display = 'block';
                    emailLoader.style.display = 'none';
                    event.preventDefault();
                    return;
                }
            }
        }
    </script>
@endsection

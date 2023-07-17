<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print Invoice</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('adminlte') }}/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('adminlte') }}/dist/css/adminlte.min.css?v=3.2.0">
    <script nonce="27d64ce4-e64f-4e99-bd9e-69f290aef836">
        (function(w, d) {
            ! function(f, g, h, i) {
                f[h] = f[h] || {};
                f[h].executed = [];
                f.zaraz = {
                    deferred: [],
                    listeners: []
                };
                f.zaraz.q = [];
                f.zaraz._f = function(j) {
                    return function() {
                        var k = Array.prototype.slice.call(arguments);
                        f.zaraz.q.push({
                            m: j,
                            a: k
                        })
                    }
                };
                for (const l of ["track", "set", "debug"]) f.zaraz[l] = f.zaraz._f(l);
                f.zaraz.init = () => {
                    var m = g.getElementsByTagName(i)[0],
                        n = g.createElement(i),
                        o = g.getElementsByTagName("title")[0];
                    o && (f[h].t = g.getElementsByTagName("title")[0].text);
                    f[h].x = Math.random();
                    f[h].w = f.screen.width;
                    f[h].h = f.screen.height;
                    f[h].j = f.innerHeight;
                    f[h].e = f.innerWidth;
                    f[h].l = f.location.href;
                    f[h].r = g.referrer;
                    f[h].k = f.screen.colorDepth;
                    f[h].n = g.characterSet;
                    f[h].o = (new Date).getTimezoneOffset();
                    if (f.dataLayer)
                        for (const s of Object.entries(Object.entries(dataLayer).reduce(((t, u) => ({
                                ...t[1],
                                ...u[1]
                            })), {}))) zaraz.set(s[0], s[1], {
                            scope: "page"
                        });
                    f[h].q = [];
                    for (; f.zaraz.q.length;) {
                        const v = f.zaraz.q.shift();
                        f[h].q.push(v)
                    }
                    n.defer = !0;
                    for (const w of [localStorage, sessionStorage]) Object.keys(w || {}).filter((y => y.startsWith(
                        "_zaraz_"))).forEach((x => {
                        try {
                            f[h]["z_" + x.slice(7)] = JSON.parse(w.getItem(x))
                        } catch {
                            f[h]["z_" + x.slice(7)] = w.getItem(x)
                        }
                    }));
                    n.referrerPolicy = "origin";
                    n.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(f[h])));
                    m.parentNode.insertBefore(n, m)
                };
                ["complete", "interactive"].includes(g.readyState) ? zaraz.init() : f.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<body>
    <div class="wrapper">
        <div class="invoice p-3 mb-3">
            <div class="row">
                <div class="col-12">
                        <h4>
                        <i class="fas fa-globe"></i>
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

                   <h6><b>{{ $terbilang }} rupiah.</b> </h6>
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


    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>

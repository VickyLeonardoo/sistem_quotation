@extends('partials.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title text-center">
                        <h1>Arsip</h1>
                    </div>
                    <hr>
                    <div class="card-category"></div>
                    {{-- <a href="/master-data/produk/tambah-data" class="btn btn-primary">Tambah Project</a><br><br> --}}
                    <div class="row row-projects justify-content-center">
						<div class="col-sm-6 col-lg-3">
							<div class="card">
								<div class="p-2">
									<img class="card-img-top rounded" src="{{ asset('atlantis') }}/assets/img/examples/product3.jpg" alt="Product 3">
								</div>
								<div class="card-body pt-2">
									<h4 class="mb-1 fw-bold">Quotation</h4>
									<p class="text-muted small mb-2"><a href="/menu/archive/quotation">Selengkapnya....</a></p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="card">
								<div class="p-2">
									<img class="card-img-top rounded" src="{{ asset('atlantis') }}/assets/img/examples/product4.jpg" alt="Product 4">
								</div>
								<div class="card-body pt-2">
									<h4 class="mb-1 fw-bold">Invoice</h4>
									<p class="text-muted small mb-2"><a href="/menu/archive/invoice">Selengkapnya....</a></p>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-lg-3">
							<div class="card">
								<div class="p-2">
									<img class="card-img-top rounded" src="{{ asset('atlantis') }}/assets/img/examples/product3.jpg" alt="Product 5">
								</div>
								<div class="card-body pt-2">
									<h4 class="mb-1 fw-bold">Delivery Order</h4>
									<p class="text-muted small mb-2"><a href="/menu/archive/delivery-order">Selengkapnya....</a></p>
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('partials.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="text-right">
                        <a href="/menu/draft-delivery-order" class="btn btn-primary">Kembali</a>
                    </div>
                    <form action="/menu/draft-delivery-order/simpan" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Nomor Delivery:</label>
                            <input type="text" readonly class="form-control" name="deliveryNo" placeholder="Masukkan Kode Perusahaan" value="{{ $deliveryNo }}">
                        </div>
                        <div class="form-group">
                            <label for="">Invoice No:</label>
                            <select name="invoice_id" class="form-control selectpicker {{ $errors->has('invoice_id') ? 'is-invalid':'' }}" data-live-search="true">
                                @foreach ($invoices as $invoice)
                                    <option value="{{ $invoice->id }}">{{ $invoice->invoiceNo }} - {{ $invoice->quotation->quotationNo }}</option>
                                @endforeach
                            </select>
                            @error('invoice_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Delivery:</label>
                            <input type="date" name="tglDelivery" class="form-control {{ $errors->has('tglDelivery') ? 'is-invalid':''}}" value="{{ old('tglDelivery') }}">
                            @error('tglDelivery')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" class="form-control btn btn-info" value="Simpan" >
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

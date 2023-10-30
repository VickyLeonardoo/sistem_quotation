@extends('partials.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="content-wrapper mt-5">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                            </div>
                        </div>
                    </div>
                </section>
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card full-height">
                                    <div class="card-body">
                                        <div class="invoice p-3 mb-3">
                                            <form action="/simpan-profile" method="POST">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">Nama CV</label>
                                                            <input type="text" name="nama" class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}" placeholder="Masukkan Nama CV" value="{{ $cv->nama == '' ? '-':$cv->nama  }}">
                                                            @error('nama')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">Alamat CV</label>
                                                            <input type="text" name="alamat" class="form-control {{ $errors->has('alamat') ? 'is-invalid':'' }}" placeholder="Masukkan Alamat CV" value="{{ $cv->alamat == '' ? '-':$cv->alamat  }}">
                                                            @error('alamat')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="text" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" placeholder="Masukkan Email CV" value="{{ $cv->email == '' ? '-':$cv->email  }}">
                                                            @error('email')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">Kota</label>
                                                            <input type="text" name="kota" class="form-control {{ $errors->has('kota') ? 'is-invalid':'' }}" placeholder="Masukkan Kota CV" value="{{ $cv->kota == '' ? '-':$cv->kota  }}">
                                                            @error('kota')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">Provinsi</label>
                                                            <input type="text" name="provinsi" class="form-control {{ $errors->has('provinsi') ? 'is-invalid':'' }}" placeholder="Masukkan Provinsi CV" value="{{ $cv->provinsi == '' ? '-':$cv->provinsi  }}">
                                                            @error('provinsi')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="">Jalan 1</label>
                                                            <input type="text" name="jalan1" class="form-control" placeholder="Masukkan Jalan 1" value="{{ $cv->jalan1 == '' ? '-':$cv->jalan1  }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="">Jalan 2</label>
                                                            <input type="text" name="jalan2" class="form-control" placeholder="Masukkan Jalan 2" value="{{ $cv->jalan2 == '' ? '-':$cv->jalan2  }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="">Jalan 3</label>
                                                            <input type="text" name="jalan3" class="form-control" placeholder="Masukkan Jalan 3" value="{{ $cv->jalan3 == '' ? '-':$cv->jalan3  }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="">No Telpon</label>
                                                            <input type="text" name="noTelp" class="form-control {{ $errors->has('noTelp') ? 'is-invalid':'' }}" placeholder="Masukkan Telp" value="{{ $cv->noTelp == '' ? '-':$cv->noTelp  }}">
                                                            @error('noTelp')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="">Fax</label>
                                                            <input type="text" name="fax" class="form-control" placeholder="Masukkan Fax " value="{{ $cv->fax == '' ? '-':$cv->fax }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <label for="">Kode Post</label>
                                                            <input type="text" name="kodePos" class="form-control" placeholder="Masukkan Kode Pos" value="{{ $cv->kodePos == '' ? '-':$cv->kodePos  }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <input type="submit" value="Simpan" class="form-control btn-primary btn">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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

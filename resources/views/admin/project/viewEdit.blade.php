@extends('partials.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible"><h5>{{ session('success') }}</h5></div>
                    @endif
                    <a href="/menu/project/ongoing" class="btn btn-primary ">Kembali</a><br><br>
                    <form action="{{ route('menu.project.ongoing.update',$project->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Project:</label>
                            <input type="text" name="nama" class="form-control" value="{{ $project->nama  }}" placeholder="Masukkan Nama Project">
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Quotation:</label>
                            <input type="text" name="quotation_id" class="form-control" value="{{ $project->quotation->quotationNo }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Status:</label>
                            <select name="status" class="form-control">
                                <option value="0" {{ $project->status == '0' ? 'selected':'' }}>Dalam Pengerjaan</option>
                                <option value="1" {{ $project->status == '1' ? 'selected':'' }}>Selesai Pengerjaan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
            <div class="card full-height">
                <div class="card-header">
                    <h3>Status Pengerjaan</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Progres</label>
                        <input type="text" class="form-control" value="{{ $project->proses }}">
                    </div>
                    <div class="form-group">
                        <label for="">Progres</label>
                        <input type="text" class="form-control" value="{{ $project->proses }}">
                    </div>
                    <div class="form-group">
                        <label for="">Progres</label>
                        <input type="text" class="form-control" value="{{ $project->proses }}">
                    </div>
                    <div class="form-group">
                        <label for="">Progres</label>
                        <input type="text" class="form-control" value="{{ $project->proses }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

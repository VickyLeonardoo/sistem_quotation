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
                            <label for="">Deskripsi Project:</label>
                            <textarea name="deskripsi" class="form-control" placeholder="Masukkan Deskripsi Project" rows="3">{{ $project->deskripsi }}</textarea>
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
                    <div class="row">
                        <div class="col-6">
                            <h4>Log Pengerjaan</h4>
                        </div>
                        {{-- <div class="col-6">
                            <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#exampleModal">Tambah</button>
                        </div> --}}
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Tanggal</th>
                                    <th>Deskripsi Pekerjaan</th>
                                    <th>Kemajuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($project->log as $log)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ \Carbon\Carbon::parse($log->tglPekerjaan)->isoFormat('D MMMM Y') }}</td>
                                        <td>{{ $log->deskripsi }}</td>
                                        <td>{{ $log->persentase }}%</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

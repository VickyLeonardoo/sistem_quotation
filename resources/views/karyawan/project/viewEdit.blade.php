@extends('partials.karyawan.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible"><h5>{{ session('success') }}</h5></div>
                    @endif
                    <a href="/karyawan/menu/project/ongoing" class="btn btn-primary ">Kembali</a><br><br>
                    <form action="{{ route('karyawan.menu.project.ongoing.update',$project->id) }}" method="POST">
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
                    <div class="row">
                        <div class="col-6">
                            <h4>Log Pengerjaan</h4>
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#exampleModal">Tambah</button>
                        </div>
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
                    {{-- <form action="">
                        <div class="form-group">
                            <label for="">Progres</label>
                            <input type="number" class="form-control" placeholder="Masukkan Proses %" value="{{ $project->proses }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('karyawan.menu.project.simpan.log',$project->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-2">
                    <b>
                        Kemajuan Proyek:
                    </b>
                </div>
                <div class="col-sm-10">
                    <div class="form-group">
                        <input type="number" class="form-control {{ $errors->has('persentase') ? 'is-invalid':'' }}"  name="persentase" value="{{ old('persentase') }}">
                        @error('persentase')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-2">
                    <b>
                        Deskripsi Pekerjaan:
                    </b>
                </div>
                <div class="col-sm-10">
                    <div class="form-group">
                        <textarea name="deskripsi" class="form-control {{ $errors->has('deskripsi') ? 'is-invalid':'' }}" rows="4" placeholder="Isi deskripsi pekerjaan minimal 10 karakter">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                     </div>
                </div>
                <div class="col-sm-2">
                    <b>
                        Tanggal Pekerjaan:
                    </b>
                </div>
                <div class="col-sm-10">
                    <div class="form-group">
                        <input type="date" class="form-control {{ $errors->has('tglPekerjaan') ? 'is-invalid':'' }}" name="tglPekerjaan" value="{{ old('tglPekerjaan') }}">
                        @error('tglPekerjaan')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
    </div>
  </div>
@endsection

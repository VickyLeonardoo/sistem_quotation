@extends('partials.header')
@section('content')
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Archive Quotation</div>
                    <div class="card-category"></div>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Tahun</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($years as $year)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $year->year }}</td>
                                    <td>
                                        <a href="/menu/archive/invoice/year-{{ $year->year }}" class="btn-sm btn btn-primary">Selengkapnya</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

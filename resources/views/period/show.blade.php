@extends('layout.app')

@section('content')
<div class="row bg-title">
    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
        <h4 class="page-title">Detail Periode</h4>
    </div>
    <div class="col-lg-8 col-sm-7 col-md-7 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('periods.index') }}">Periode</a></li>
            <li class="active">Detail</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="white-box">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="box-title">Informasi Periode</h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('periods.edit', $period->id) }}" class="btn btn-warning btn-rounded">
                        <i class="fa fa-pencil"></i> Edit
                    </a>
                    <a href="{{ route('periods.index') }}" class="btn btn-default btn-rounded">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <hr>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th width="30%">Nama Periode</th>
                        <td>{{ $period->name }}</td>
                    </tr>
                    <tr>
                        <th>Tahun</th>
                        <td>{{ $period->year }}</td>
                    </tr>
                    <tr>
                        <th>Semester</th>
                        <td>{{ $period->semester ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Mulai</th>
                        <td>{{ $period->start_date->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Selesai</th>
                        <td>{{ $period->end_date->format('d/m/Y') }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($period->is_active)
                                <span class="label label-success">Aktif</span>
                            @else
                                <span class="label label-default">Nonaktif</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Dibuat Pada</th>
                        <td>{{ $period->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

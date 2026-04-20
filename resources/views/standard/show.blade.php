@extends('layout.app')

@section('content')
<div class="row bg-title">
    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
        <h4 class="page-title">Detail Standar</h4>
    </div>
    <div class="col-lg-8 col-sm-7 col-md-7 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('standards.index') }}">Standar</a></li>
            <li class="active">Detail</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="white-box">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="box-title">Informasi Standar</h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('standards.edit', $standard->id) }}" class="btn btn-warning btn-rounded">
                        <i class="fa fa-pencil"></i> Edit
                    </a>
                    <a href="{{ route('standards.index') }}" class="btn btn-default btn-rounded">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <hr>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th width="25%">Kode</th>
                        <td><span class="label label-primary">{{ $standard->code }}</span></td>
                    </tr>
                    <tr>
                        <th>Nama Standar</th>
                        <td>{{ $standard->name }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $standard->description ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Indikator</th>
                        <td><span class="label label-info">{{ $standard->indicators->count() }}</span></td>
                    </tr>
                    <tr>
                        <th>Dibuat Pada</th>
                        <td>{{ $standard->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </tbody>
            </table>

            @if($standard->indicators->count() > 0)
            <h4 class="box-title m-t-20">Daftar Indikator</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Indikator</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($standard->indicators as $i => $indicator)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $indicator->code ?? '-' }}</td>
                        <td>{{ $indicator->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection

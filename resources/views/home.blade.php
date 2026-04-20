@extends('layout.app')

@section('content')
<div class="row bg-title">
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title">Dashboard</h4>
    </div>
    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
        <ol class="breadcrumb">
            <li class="active">Dashboard</li>
        </ol>
    </div>
</div>

{{-- Periode Aktif Banner --}}
@if($stats['active_period'])
<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <i class="fa fa-calendar"></i>
            <strong>Periode Aktif:</strong> {{ $stats['active_period']->name }}
            &nbsp;&mdash;&nbsp;
            {{ $stats['active_period']->start_date->format('d/m/Y') }} s/d {{ $stats['active_period']->end_date->format('d/m/Y') }}
        </div>
    </div>
</div>
@endif

{{-- Stat Cards --}}
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="white-box analytics-info">
            <h3 class="box-title">Total Pengguna</h3>
            <ul class="list-inline two-part">
                <li>
                    <div id="sparkline8"><span class="counter text-purple">{{ $stats['users'] }}</span></div>
                </li>
                <li class="text-right">
                    <i class="fa fa-users text-purple f-s-30"></i>
                </li>
            </ul>
            <a href="{{ route('users.index') }}" class="btn btn-purple btn-sm btn-rounded m-t-5">
                <i class="fa fa-arrow-right"></i> Lihat Data
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="white-box analytics-info">
            <h3 class="box-title">Total Role</h3>
            <ul class="list-inline two-part">
                <li>
                    <div><span class="counter text-info">{{ $stats['roles'] }}</span></div>
                </li>
                <li class="text-right">
                    <i class="fa fa-id-badge text-info f-s-30"></i>
                </li>
            </ul>
            <a href="{{ route('roles.index') }}" class="btn btn-info btn-sm btn-rounded m-t-5">
                <i class="fa fa-arrow-right"></i> Lihat Data
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="white-box analytics-info">
            <h3 class="box-title">Total Unit</h3>
            <ul class="list-inline two-part">
                <li>
                    <div><span class="counter text-success">{{ $stats['units'] }}</span></div>
                </li>
                <li class="text-right">
                    <i class="fa fa-sitemap text-success f-s-30"></i>
                </li>
            </ul>
            <a href="{{ route('units.index') }}" class="btn btn-success btn-sm btn-rounded m-t-5">
                <i class="fa fa-arrow-right"></i> Lihat Data
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="white-box analytics-info">
            <h3 class="box-title">Total Standar</h3>
            <ul class="list-inline two-part">
                <li>
                    <div><span class="counter text-warning">{{ $stats['standards'] }}</span></div>
                </li>
                <li class="text-right">
                    <i class="fa fa-bookmark text-warning f-s-30"></i>
                </li>
            </ul>
            <a href="{{ route('standards.index') }}" class="btn btn-warning btn-sm btn-rounded m-t-5">
                <i class="fa fa-arrow-right"></i> Lihat Data
            </a>
        </div>
    </div>
</div>

{{-- Quick Access --}}
<div class="row">
    <div class="col-md-12">
        <div class="white-box">
            <h3 class="box-title">Akses Cepat</h3>
            <div class="row m-t-10">
                <div class="col-md-2 col-sm-4 col-xs-6 text-center m-b-15">
                    <a href="{{ route('users.create') }}" class="btn btn-circle btn-lg btn-purple">
                        <i class="fa fa-user-plus"></i>
                    </a>
                    <p class="m-t-5">Tambah Pengguna</p>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 text-center m-b-15">
                    <a href="{{ route('roles.create') }}" class="btn btn-circle btn-lg btn-info">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                    <p class="m-t-5">Tambah Role</p>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 text-center m-b-15">
                    <a href="{{ route('units.create') }}" class="btn btn-circle btn-lg btn-success">
                        <i class="fa fa-building"></i>
                    </a>
                    <p class="m-t-5">Tambah Unit</p>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 text-center m-b-15">
                    <a href="{{ route('periods.create') }}" class="btn btn-circle btn-lg btn-warning">
                        <i class="fa fa-calendar-plus-o"></i>
                    </a>
                    <p class="m-t-5">Tambah Periode</p>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 text-center m-b-15">
                    <a href="{{ route('standards.create') }}" class="btn btn-circle btn-lg btn-danger">
                        <i class="fa fa-file-text"></i>
                    </a>
                    <p class="m-t-5">Tambah Standar</p>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 text-center m-b-15">
                    <a href="{{ route('periods.index') }}" class="btn btn-circle btn-lg btn-default">
                        <i class="fa fa-calendar"></i>
                    </a>
                    <p class="m-t-5">Manajemen Periode</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Summary Table --}}
<div class="row">
    <div class="col-md-6">
        <div class="white-box">
            <h3 class="box-title">Ringkasan Modul</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Modul</th>
                        <th class="text-center">Total Data</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><i class="fa fa-users text-purple"></i> Pengguna</td>
                        <td class="text-center"><span class="label label-purple">{{ $stats['users'] }}</span></td>
                        <td class="text-center"><a href="{{ route('users.index') }}" class="btn btn-xs btn-purple">Kelola</a></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-id-badge text-info"></i> Role</td>
                        <td class="text-center"><span class="label label-info">{{ $stats['roles'] }}</span></td>
                        <td class="text-center"><a href="{{ route('roles.index') }}" class="btn btn-xs btn-info">Kelola</a></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-sitemap text-success"></i> Unit</td>
                        <td class="text-center"><span class="label label-success">{{ $stats['units'] }}</span></td>
                        <td class="text-center"><a href="{{ route('units.index') }}" class="btn btn-xs btn-success">Kelola</a></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-calendar text-warning"></i> Periode</td>
                        <td class="text-center"><span class="label label-warning">{{ $stats['periods'] }}</span></td>
                        <td class="text-center"><a href="{{ route('periods.index') }}" class="btn btn-xs btn-warning">Kelola</a></td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-bookmark text-danger"></i> Standar</td>
                        <td class="text-center"><span class="label label-danger">{{ $stats['standards'] }}</span></td>
                        <td class="text-center"><a href="{{ route('standards.index') }}" class="btn btn-xs btn-danger">Kelola</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6">
        <div class="white-box">
            <h3 class="box-title">Info Sistem</h3>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th width="40%">Aplikasi</th>
                        <td>{{ config('app.name') }}</td>
                    </tr>
                    <tr>
                        <th>Pengguna Login</th>
                        <td>{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>{{ Auth::user()->role->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Unit</th>
                        <td>{{ Auth::user()->unit->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Periode Aktif</th>
                        <td>
                            @if($stats['active_period'])
                                <span class="label label-success">{{ $stats['active_period']->name }}</span>
                            @else
                                <span class="label label-default">Belum ada periode aktif</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{ now()->translatedFormat('l, d F Y') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


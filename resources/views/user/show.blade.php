@extends('layout.app')

@section('content')
<div class="row bg-title">
    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
        <h4 class="page-title">Detail Pengguna</h4>
    </div>
    <div class="col-lg-8 col-sm-7 col-md-7 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('users.index') }}">Pengguna</a></li>
            <li class="active">Detail</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="white-box">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="box-title">Informasi Pengguna</h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-rounded">
                        <i class="fa fa-pencil"></i> Edit
                    </a>
                    <a href="{{ route('users.index') }}" class="btn btn-default btn-rounded">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <hr>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th width="30%">Nama Lengkap</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>{{ $user->role->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Unit</th>
                        <td>{{ $user->unit->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($user->is_active)
                                <span class="label label-success">Aktif</span>
                            @else
                                <span class="label label-danger">Nonaktif</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Terdaftar Sejak</th>
                        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

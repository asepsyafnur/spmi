@extends('layout.app')

@section('content')
<div class="row bg-title">
    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
        <h4 class="page-title">Detail Role</h4>
    </div>
    <div class="col-lg-8 col-sm-7 col-md-7 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('roles.index') }}">Role</a></li>
            <li class="active">Detail</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="white-box">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="box-title">Informasi Role</h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-rounded">
                        <i class="fa fa-pencil"></i> Edit
                    </a>
                    <a href="{{ route('roles.index') }}" class="btn btn-default btn-rounded">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <hr>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th width="30%">Nama Role</th>
                        <td>{{ $role->name }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $role->description ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Pengguna</th>
                        <td><span class="label label-primary">{{ $role->users_count }}</span></td>
                    </tr>
                    <tr>
                        <th>Dibuat Pada</th>
                        <td>{{ $role->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

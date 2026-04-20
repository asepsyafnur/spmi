@extends('layout.app')

@section('content')
<div class="row bg-title">
    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
        <h4 class="page-title">Detail Unit</h4>
    </div>
    <div class="col-lg-8 col-sm-7 col-md-7 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('units.index') }}">Unit</a></li>
            <li class="active">Detail</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="white-box">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="box-title">Informasi Unit</h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-warning btn-rounded">
                        <i class="fa fa-pencil"></i> Edit
                    </a>
                    <a href="{{ route('units.index') }}" class="btn btn-default btn-rounded">
                        <i class="fa fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <hr>
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th width="25%">Nama Unit</th>
                        <td>{{ $unit->name }}</td>
                    </tr>
                    <tr>
                        <th>Tipe</th>
                        <td><span class="label label-info">{{ $unit->type }}</span></td>
                    </tr>
                    <tr>
                        <th>Unit Induk</th>
                        <td>{{ $unit->parent->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Dibuat Pada</th>
                        <td>{{ $unit->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </tbody>
            </table>

            @if($unit->children->count() > 0)
            <h4 class="box-title m-t-20">Sub Unit</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tipe</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($unit->children as $i => $child)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $child->name }}</td>
                        <td><span class="label label-info">{{ $child->type }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif

            @if($unit->users->count() > 0)
            <h4 class="box-title m-t-20">Pengguna di Unit Ini</h4>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($unit->users as $i => $user)
                    <tr>
                        <td>{{ $i + 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection

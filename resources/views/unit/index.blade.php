@extends('layout.app')

@section('content')
<div class="row bg-title">
    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
        <h4 class="page-title">Data Unit</h4>
    </div>
    <div class="col-lg-8 col-sm-7 col-md-7 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li class="active">Unit</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="white-box">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="box-title">Daftar Unit</h3>
                </div>
                <div class="col-md-6 text-right">
                    <a href="{{ route('units.create') }}" class="btn btn-success btn-rounded">
                        <i class="fa fa-plus"></i> Tambah Unit
                    </a>
                </div>
            </div>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session('success') }}
            </div>
            @endif

            <div class="table-responsive m-t-20">
                <table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Unit</th>
                            <th>Tipe</th>
                            <th>Unit Induk</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($units as $index => $unit)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $unit->name }}</td>
                            <td><span class="label label-info">{{ $unit->type }}</span></td>
                            <td>{{ $unit->parent->name ?? '-' }}</td>
                            <td>
                                <a href="{{ route('units.show', $unit->id) }}" class="btn btn-info btn-sm" title="Detail">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{ route('units.destroy', $unit->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus unit ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

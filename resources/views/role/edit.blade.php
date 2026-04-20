@extends('layout.app')

@section('content')
<div class="row bg-title">
    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
        <h4 class="page-title">Edit Role</h4>
    </div>
    <div class="col-lg-8 col-sm-7 col-md-7 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('roles.index') }}">Role</a></li>
            <li class="active">Edit</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="white-box">
            <h3 class="box-title">Form Edit Role</h3>
            <form action="{{ route('roles.update', $role->id) }}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="form-group @error('name') has-error @enderror">
                    <label class="col-md-3 control-label">Nama Role <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="text" name="name" class="form-control" value="{{ old('name', $role->name) }}" placeholder="Masukkan nama role" required>
                        @error('name')<span class="help-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group @error('description') has-error @enderror">
                    <label class="col-md-3 control-label">Deskripsi</label>
                    <div class="col-md-9">
                        <textarea name="description" class="form-control" rows="3" placeholder="Masukkan deskripsi role">{{ old('description', $role->description) }}</textarea>
                        @error('description')<span class="help-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-warning btn-rounded">
                            <i class="fa fa-save"></i> Perbarui
                        </button>
                        <a href="{{ route('roles.index') }}" class="btn btn-default btn-rounded">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

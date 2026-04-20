@extends('layout.app')

@section('content')
<div class="row bg-title">
    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
        <h4 class="page-title">Tambah Pengguna</h4>
    </div>
    <div class="col-lg-8 col-sm-7 col-md-7 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('users.index') }}">Pengguna</a></li>
            <li class="active">Tambah</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="white-box">
            <h3 class="box-title">Form Tambah Pengguna</h3>
            <form action="{{ route('users.store') }}" method="POST" class="form-horizontal">
                @csrf
                <div class="form-group @error('name') has-error @enderror">
                    <label class="col-md-3 control-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
                        @error('name')<span class="help-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group @error('email') has-error @enderror">
                    <label class="col-md-3 control-label">Email <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Masukkan email" required>
                        @error('email')<span class="help-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group @error('role_id') has-error @enderror">
                    <label class="col-md-3 control-label">Role <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <select name="role_id" class="form-control" required>
                            <option value="">-- Pilih Role --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id')<span class="help-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group @error('unit_id') has-error @enderror">
                    <label class="col-md-3 control-label">Unit</label>
                    <div class="col-md-9">
                        <select name="unit_id" class="form-control">
                            <option value="">-- Pilih Unit --</option>
                            @foreach($units as $unit)
                                <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->name }} ({{ $unit->type }})</option>
                            @endforeach
                        </select>
                        @error('unit_id')<span class="help-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group @error('is_active') has-error @enderror">
                    <label class="col-md-3 control-label">Status <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <select name="is_active" class="form-control" required>
                            <option value="1" selected>Aktif</option>
                            <option value="0">Nonaktif</option>
                        </select>
                        @error('is_active')<span class="help-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group @error('password') has-error @enderror">
                    <label class="col-md-3 control-label">Password <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter" required>
                        @error('password')<span class="help-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group @error('password_confirmation') has-error @enderror">
                    <label class="col-md-3 control-label">Konfirmasi Password <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                        @error('password_confirmation')<span class="help-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-success btn-rounded">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                        <a href="{{ route('users.index') }}" class="btn btn-default btn-rounded">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

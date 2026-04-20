@extends('layout.app')

@section('content')
<div class="row bg-title">
    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
        <h4 class="page-title">Edit Unit</h4>
    </div>
    <div class="col-lg-8 col-sm-7 col-md-7 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('units.index') }}">Unit</a></li>
            <li class="active">Edit</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="white-box">
            <h3 class="box-title">Form Edit Unit</h3>
            <form action="{{ route('units.update', $unit->id) }}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="form-group @error('name') has-error @enderror">
                    <label class="col-md-3 control-label">Nama Unit <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="text" name="name" class="form-control" value="{{ old('name', $unit->name) }}" placeholder="Masukkan nama unit" required>
                        @error('name')<span class="help-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group @error('type') has-error @enderror">
                    <label class="col-md-3 control-label">Tipe <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <select name="type" class="form-control" required>
                            <option value="">-- Pilih Tipe --</option>
                            @foreach(['Fakultas','Program Studi','Lembaga','UPT','Biro','Bagian'] as $tipe)
                                <option value="{{ $tipe }}" {{ old('type', $unit->type) == $tipe ? 'selected' : '' }}>{{ $tipe }}</option>
                            @endforeach
                        </select>
                        @error('type')<span class="help-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group @error('parent_id') has-error @enderror">
                    <label class="col-md-3 control-label">Unit Induk</label>
                    <div class="col-md-9">
                        <select name="parent_id" class="form-control">
                            <option value="">-- Tidak Ada (Unit Induk) --</option>
                            @foreach($parents as $parent)
                                <option value="{{ $parent->id }}" {{ old('parent_id', $unit->parent_id) == $parent->id ? 'selected' : '' }}>
                                    {{ $parent->name }} ({{ $parent->type }})
                                </option>
                            @endforeach
                        </select>
                        @error('parent_id')<span class="help-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-warning btn-rounded">
                            <i class="fa fa-save"></i> Perbarui
                        </button>
                        <a href="{{ route('units.index') }}" class="btn btn-default btn-rounded">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

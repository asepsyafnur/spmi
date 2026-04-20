@extends('layout.app')

@section('content')
<div class="row bg-title">
    <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
        <h4 class="page-title">Edit Periode</h4>
    </div>
    <div class="col-lg-8 col-sm-7 col-md-7 col-xs-12">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">Dashboard</a></li>
            <li><a href="{{ route('periods.index') }}">Periode</a></li>
            <li class="active">Edit</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="white-box">
            <h3 class="box-title">Form Edit Periode</h3>
            <form action="{{ route('periods.update', $period->id) }}" method="POST" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="form-group @error('name') has-error @enderror">
                    <label class="col-md-3 control-label">Nama Periode <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="text" name="name" class="form-control" value="{{ old('name', $period->name) }}" placeholder="Contoh: Periode 2025/2026 Ganjil" required>
                        @error('name')<span class="help-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group @error('year') has-error @enderror">
                    <label class="col-md-3 control-label">Tahun <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="number" name="year" class="form-control" value="{{ old('year', $period->year) }}" min="2000" max="2100" required>
                        @error('year')<span class="help-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group @error('semester') has-error @enderror">
                    <label class="col-md-3 control-label">Semester</label>
                    <div class="col-md-9">
                        <select name="semester" class="form-control">
                            <option value="">-- Tidak Ada --</option>
                            <option value="Ganjil" {{ old('semester', $period->semester) == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                            <option value="Genap" {{ old('semester', $period->semester) == 'Genap' ? 'selected' : '' }}>Genap</option>
                        </select>
                        @error('semester')<span class="help-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group @error('start_date') has-error @enderror">
                    <label class="col-md-3 control-label">Tanggal Mulai <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $period->start_date->format('Y-m-d')) }}" required>
                        @error('start_date')<span class="help-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group @error('end_date') has-error @enderror">
                    <label class="col-md-3 control-label">Tanggal Selesai <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $period->end_date->format('Y-m-d')) }}" required>
                        @error('end_date')<span class="help-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group @error('is_active') has-error @enderror">
                    <label class="col-md-3 control-label">Status <span class="text-danger">*</span></label>
                    <div class="col-md-9">
                        <select name="is_active" class="form-control" required>
                            <option value="0" {{ old('is_active', $period->is_active ? '1' : '0') == '0' ? 'selected' : '' }}>Nonaktif</option>
                            <option value="1" {{ old('is_active', $period->is_active ? '1' : '0') == '1' ? 'selected' : '' }}>Aktif</option>
                        </select>
                        <span class="help-block text-info"><i class="fa fa-info-circle"></i> Mengaktifkan periode ini akan menonaktifkan periode lain yang sedang aktif.</span>
                        @error('is_active')<span class="help-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-warning btn-rounded">
                            <i class="fa fa-save"></i> Perbarui
                        </button>
                        <a href="{{ route('periods.index') }}" class="btn btn-default btn-rounded">
                            <i class="fa fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

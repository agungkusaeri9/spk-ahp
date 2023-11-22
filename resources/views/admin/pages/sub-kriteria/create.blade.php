@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Sub Kriteria</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.sub-kriteria.index') }}">Kriteria</a></div>
                <div class="breadcrumb-item">Tambah Sub Kriteria</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.sub-kriteria.store') }}" method="post" class="needs-validation"
                                novalidate="" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Kriteria</label>
                                    <select name="kriteria_id" id="kriteria_id"
                                        class="form-control @error('kriteria_id') is-invalid @enderror">
                                        <option value="" selected>Pilih Kriteria</option>
                                        @foreach ($data_kriteria as $kriteria)
                                            <option value="{{ $kriteria->id }}">{{ $kriteria->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('kode')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama Sub Kriteria</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        required="" name="nama" value="{{ old('nama') }}">
                                    @error('nama')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class='form-group mb-3'>
                                    <label for='keterangan' class='mb-2'>Keterangan</label>
                                    <input type='text' name='keterangan'
                                        class='form-control @error('keterangan') is-invalid @enderror'
                                        value='{{ old('keterangan') }}'>
                                    @error('keterangan')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn float-right btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

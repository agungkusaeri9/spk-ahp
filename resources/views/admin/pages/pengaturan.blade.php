@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Pengaturan Web</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Pengaturan Web</div>
            </div>
        </div>
        <div class="section-body">


            <div class="row mt-sm-4">
                <div class="col-12">
                    <div class="alert alert-info">
                        <strong>Perhatian!</strong>
                        <p class="">Didalam keterangan kesimpulan, gunakan tanda <> untuk merepresentasikan
                                pemenangnya.</p>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <div class="card">
                        <form method="post" class="needs-validation" action="{{ route('admin.pengaturan.update') }}"
                            novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Pengaturan Web</h4>
                            </div>
                            <div class="card-body">
                                <div class='form-group mb-3'>
                                    <label for='nama_situs' class='mb-2'>Nama Situs</label>
                                    <input type='text' name='nama_situs'
                                        class='form-control @error('nama_situs') is-invalid @enderror'
                                        value='{{ $item->nama_situs ?? old('nama_situs') }}'>
                                    @error('nama_situs')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class='form-group mb-3'>
                                    <label for='pembuat' class='mb-2'>Pembuat</label>
                                    <input type='text' name='pembuat'
                                        class='form-control @error('pembuat') is-invalid @enderror'
                                        value='{{ $item->pembuat ?? old('pembuat') }}'>
                                    @error('pembuat')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class='form-group mb-3'>
                                    <label for='jumlah_pemenang' class='mb-2'>Jumlah Pemenang</label>
                                    <input type='number' name='jumlah_pemenang'
                                        class='form-control @error('jumlah_pemenang') is-invalid @enderror'
                                        value='{{ $item->jumlah_pemenang ?? old('jumlah_pemenang') }}'>
                                    @error('jumlah_pemenang')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class='form-group mb-3'>
                                    <label for='deskripsi' class='mb-2'>Deskripsi</label>
                                    <textarea name='deskripsi' id='deskripsi' cols='30' rows='3'
                                        class='form-control @error('deskripsi') is-invalid @enderror'>{{ $item->deskripsi ?? old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class='form-group mb-3'>
                                    <label for='keterangan_kesimpulan' class='mb-2'>Keterangan Kesimpulan</label>
                                    <textarea name='keterangan_kesimpulan' id='keterangan_kesimpulan' cols='30' rows='3'
                                        class='form-control @error('keterangan_kesimpulan') is-invalid @enderror'>{{ $item->keterangan_kesimpulan ?? old('keterangan_kesimpulan') }}</textarea>
                                    @error('keterangan_kesimpulan')
                                        <div class='invalid-feedback'>
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Update Pengaturan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    @include('admin.layouts.partials.sweetalert')
@endpush

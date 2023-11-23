@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Matrik Nilai Sub Kriteria (Normalisasi) - {{ $kriteria->nama }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Matrik Nilai Sub Kriteria (Normalisasi)</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Matriks Nilai Sub Kriteria (Normalisasi) </h4>
                        </div>
                        <div class="card-body">
                            <form action="javascript:void(0)" method="post">
                                @csrf
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sub Kriteria</th>
                                            @foreach ($data_sub_kriteria as $sub_kriteria)
                                                <th>{{ $sub_kriteria->nama }}</th>
                                            @endforeach
                                            <th>Jumlah</th>
                                            <th>Prioritas</th>
                                            <th>Prioritas Sub Kriteria</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_sub_kriteria as $sub_kriteria1)
                                            <tr>
                                                <th>{{ $sub_kriteria1->nama }}</th>
                                                @foreach ($data_sub_kriteria as $sub_kriteria2)
                                                    <td>
                                                        <input type="text" class="form-control inputNumber"
                                                            min="0" step="0.001" required
                                                            value="{{ getNormalisasiNilaiSubKriteria($sub_kriteria1->id, $sub_kriteria2->id) }}"
                                                            readonly>
                                                    </td>
                                                @endforeach
                                                <td>
                                                    <input type="text" class="form-control" min="0" step="0.001"
                                                        required
                                                        value="{{ getJumlahNormalisasiBarisSubKriteria($kriteria->id, $sub_kriteria1->id, $sub_kriteria2->id) }}"
                                                        id="jumlah" readonly>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="matriks[{{ $sub_kriteria1->id }}][{{ $sub_kriteria2->id }}]"
                                                        min="0" step="0.001" required
                                                        value="{{ getPrioritasNormalisasiBarisSubKriteria($kriteria->id, $sub_kriteria1->id) }}"
                                                        readonly>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control"
                                                        name="matriks[{{ $sub_kriteria1->id }}][{{ $sub_kriteria2->id }}]"
                                                        min="0" step="0.001" required
                                                        value="{{ getPriotitasSubKriteria($kriteria->id, $sub_kriteria1->id) }}"
                                                        readonly>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Matrik Penjumlahan Setiap Baris </h4>
                        </div>
                        <div class="card-body">
                            <form action="javascript:void(0)" method="post">
                                @csrf
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sub Kriteria</th>
                                            @foreach ($data_sub_kriteria as $sub_kriteria)
                                                <th>{{ $sub_kriteria->nama }}</th>
                                            @endforeach
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_sub_kriteria as $sub_kriteria1)
                                            <tr>
                                                <th>{{ $sub_kriteria1->nama }}</th>
                                                @foreach ($data_sub_kriteria as $sub_kriteria2)
                                                    <td>
                                                        <input type="text" class="form-control inputNumber"
                                                            min="0" step="0.001" required
                                                            value="{{ getNilaiPenjumlahanBarisSubKriteria($kriteria->id, $sub_kriteria1->id, $sub_kriteria2->id, $sub_kriteria2->id) }}"
                                                            readonly>
                                                    </td>
                                                @endforeach
                                                <td>
                                                    <input type="text" class="form-control" min="0" step="0.001"
                                                        required
                                                        value="{{ hitungJumlahMatrikPenjumlahanSubKriteriaSetiapBaris($kriteria->id, $sub_kriteria1->id) }}"
                                                        id="jumlah" readonly>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Perhitungan Rasio Konsistensi </h4>
                        </div>
                        <div class="card-body">
                            <form action="javascript:void(0)" method="post">
                                @csrf
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sub Kriteria</th>
                                            <th>Jumlah Per Baris</th>
                                            <th>Prioritas</th>
                                            <th>Hasil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_sub_kriteria as $sub_kriteria1)
                                            <tr>
                                                <th>{{ $sub_kriteria1->nama }}</th>
                                                <td>
                                                    <input type="text" class="form-control" min="0" step="0.001"
                                                        required
                                                        value="{{ hitungJumlahMatrikPenjumlahanSubKriteriaSetiapBaris($kriteria->id, $sub_kriteria1->id) }}"
                                                        id="jumlah" readonly>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" min="0" step="0.001"
                                                        required
                                                        value="{{ getPrioritasNormalisasiBarisSubKriteria($kriteria->id, $sub_kriteria1->id) }}"
                                                        id="jumlah" readonly>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" min="0" step="0.001"
                                                        required
                                                        value="{{ getHasilPerhitunganRasioSubKriteria($kriteria->id, $sub_kriteria1->id) }}"
                                                        id="jumlah" readonly>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <table class="table">
                                        <tr>
                                            <th>Total Hasil</th>
                                            <td> : </td>
                                            <td>{{ getTotalHasilRasioKonsistensiSubKriteria($kriteria->id) }}</td>
                                        </tr>
                                        <tr>
                                            <th>Lamda Max</th>
                                            <td> : </td>
                                            <td>{{ getLamdaMaxRasioKonsistensiSubKriteria($kriteria->id) }}</td>
                                        </tr>
                                        <tr>
                                            <th>CI</th>
                                            <td> : </td>
                                            <td>{{ getCiRasioKonsistensiSubKriteria($kriteria->id) }}</td>
                                        </tr>
                                        <tr>
                                            <th>CR</th>
                                            <td> : </td>
                                            <td>{{ getCrRasioKonsistensiSubKriteria($kriteria->id) }}</td>
                                        </tr>
                                        <tr>
                                            <th>
                                                @if (getCrRasioKonsistensiSubKriteria($kriteria->id) <= 0.1)
                                                    <p>
                                                        Karena Nilai CR <= 0,1, maka perhitungannya KONSISTEN dan bisa
                                                            dilanjutkan ke tahap selanjutnya. </p> <a
                                                                href="{{ route('admin.perbandingan-sub-kriteria.index') }}"
                                                                class="btn btn-info">Lanjutkan</a>
                                                        @else
                                                            <p> Karena Nilai CR> 0,1 maka
                                                                perbandingan Berpasangan Harus diulangi lagi sehingga
                                                                menjadi
                                                                konsisten.
                                                            </p>
                                                            <a href="{{ route('admin.perbandingan-kriteria.index') }}"
                                                                class="btn btn-info">Perbaiki Perbandingan
                                                                Berpasangan</a>
                                                @endif
                                            </th>
                                        </tr>
                                    </table>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2/sweetalert2.all.min.js') }}">
    <link rel="stylesheet" href="{{ asset('assets/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('assets/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
        $(function() {
            function hitungTotal() {
                // Mengambil Semua Input dengan Class 'inputNumber'
                var inputs = document.getElementsByClassName('inputNumber');

                // Menghitung Total dari Semua Input
                var total = 0;
                for (var i = 0; i < inputs.length; i++) {
                    total += parseFloat(inputs[i].value) || 0;
                }

                // Menampilkan Hasil Total
                document.getElementById('jumlah').textContent = total;
            }
        })
    </script>
    @include('admin.layouts.partials.sweetalert')
@endpush

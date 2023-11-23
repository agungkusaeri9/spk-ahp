@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Perbandingan Matrik Sub Kriteria - {{ $kriteria->nama }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Perbandingan Matrik Sub Kriteria</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.perbandingan-sub-kriteria.hitung', $kriteria->uuid) }}"
                                method="post">
                                @csrf
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sub Kriteria</th>
                                            @foreach ($data_sub_kriteria as $sub_kriteria)
                                                <th>{{ $sub_kriteria->nama }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_sub_kriteria as $sub_kriteria1)
                                            <tr>
                                                <th>{{ $sub_kriteria1->nama }}</th>
                                                @foreach ($data_sub_kriteria as $sub_kriteria2)
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="matriks[{{ $sub_kriteria1->id }}][{{ $sub_kriteria2->id }}]"
                                                            min="0" step="0.001" required
                                                            value="{{ getNilaiPerbandinganSubKriteria($sub_kriteria1->id, $sub_kriteria2->id) }}">
                                                    </td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <button type="submit" class="btn btn-primary">Simpan Matriks</button>
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
            $('#dTable').DataTable();
        })
    </script>
    @include('admin.layouts.partials.sweetalert')
@endpush

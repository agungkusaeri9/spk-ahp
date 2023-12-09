@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Hasil</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Hasil</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('admin.hasil.export') }}" class="btn btn-danger">Export PDF</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dTable">
                                    <thead>
                                        <tr>
                                            <th>Kode Alternatif</th>
                                            <th>Nama Alternatif</th>
                                            <th>Total Nilai</th>
                                            <th class="text-center">Ranking</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_alternatif as $item => $group)
                                            <tr>
                                                <td class="align-middle text-left">{{ $group->first()->alternatif->kode }}
                                                </td>
                                                <td class="align-middle text-left">{{ $group->first()->alternatif->nama }}
                                                </td>
                                                <td>
                                                    {{ totalNilaiKriteria($group->first()->alternatif->id) }}
                                                </td>
                                                <td class="align-middle text-center">
                                                    {{ getRanking($group->first()->alternatif->id) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
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
    @include('admin.layouts.partials.sweetalert')
    <script>
        $(function() {
            $('#dTable').DataTable({
                "order": [
                    [3, "asc"]
                ]
            });
        })
    </script>
@endpush

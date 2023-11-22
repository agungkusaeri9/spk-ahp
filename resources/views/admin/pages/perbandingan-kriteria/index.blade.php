@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Perbandingan Matrik</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Perbandingan Matrik</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{-- <form action="" method="post">
                                <table class="table">
                                    <tr>
                                        <th>Kriteria 1</th>
                                        <th>Kriteria 2</th>
                                        <th>Pemenang</th>
                                        <th>Nilai</th>
                                    </tr>
                                    @foreach ($data_kriteria as $kriteria1)
                                        @foreach ($data_kriteria as $kriteria2)
                                            @csrf
                                            <input type="text" name="kriteria1[]" value="{{ $kriteria1->id }}" hidden>
                                            <input type="text" name="kriteria2[]" value="{{ $kriteria2->id }}" hidden>
                                            <tr>
                                                <td>{{ $kriteria1->kode . '- ' . $kriteria1->nama }}</td>
                                                <td>{{ $kriteria2->kode . '- ' . $kriteria2->nama }}</td>
                                                <td>
                                                    <select name="menang_{{ $kriteria1->id }}_{{ $kriteria2->id }}[]"
                                                        id="">
                                                        @if ($kriteria1->id == $kriteria2->id)
                                                            <option value="sama">Sama</option>
                                                        @else
                                                            <option value="" selected disabled>Pilih</option>
                                                            <option value="kriteria1"> {{ $kriteria1->nama }}
                                                            </option>
                                                            <option value="kriteria2"> {{ $kriteria2->nama }}
                                                            </option>
                                                        @endif
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="nilai_{{ $kriteria1->id }}_{{ $kriteria2->id }}[]"
                                                        id="">
                                                        @if ($kriteria1->id == $kriteria2->id)
                                                            <option value="1">Sama</option>
                                                        @else
                                                            <option value="" selected disabled>Pilih</option>
                                                            @foreach ($data_skala as $skala)
                                                                <option value="{{ $skala->id }}">{{ $skala->nama }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </table>
                                <div class="form-group">
                                    <button class="btn btn-primary">Hitung</button>
                                </div>
                            </form> --}}
                            <form action="{{ route('admin.perbandingan-kriteria.hitung') }}" method="post">
                                @csrf
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Kriteria</th>
                                            @foreach ($data_kriteria as $kriteria)
                                                <th>{{ $kriteria->nama }}</th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_kriteria as $kriteria1)
                                            <tr>
                                                <th>{{ $kriteria1->nama }}</th>
                                                @foreach ($data_kriteria as $kriteria2)
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            name="matriks[{{ $kriteria1->id }}][{{ $kriteria2->id }}]"
                                                            min="0" step="0.001" required
                                                            value="{{ getNilaiPerbandinganKriteria($kriteria1->id, $kriteria2->id) }}">
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
            $('body').on('click', '.btnDelete', function(e) {
                e.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let action = $(this).data('action');
                        $('#formDelete').attr('action', action);
                        $('#formDelete').submit();
                    }
                })
            })
        })
    </script>
    @include('admin.layouts.partials.sweetalert')
@endpush

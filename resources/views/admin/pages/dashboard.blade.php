@extends('admin.layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Kriteria</h4>
                        </div>
                        <div class="card-body">
                            {{ $count['kriteria'] }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Sub Kriteria</h4>
                        </div>
                        <div class="card-body">
                            {{ $count['sub_kriteria'] }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Alternatif</h4>
                        </div>
                        <div class="card-body">
                            {{ $count['alternatif'] }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>User</h4>
                        </div>
                        <div class="card-body">
                            {{ $count['user'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Hasil Penilaian</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" height="82"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');
        var dataSets = [{
                label: 'IPK',
                data: [0.12, 0.23, 0.34, 0.634, 0.434, 0.125, 0.457, 0.59],
                borderWidth: 1
            },
            {
                label: 'Tanggungan Orang Tua',
                data: [0.1232, 0.223, 0.234, 0.36, 0.24, 0.5, 0.7, 0.29],
                borderWidth: 1
            },
            {
                label: 'Penghasilan Orang Tua',
                data: [0.12, 0.523, 0.334, 0.96, 0.24, 0.5, 0.27, 0.79],
                borderWidth: 1
            },
            {
                label: 'Semester',
                data: [0.62, 0.323, 0.534, 0.296, 0.234, 0.45, 0.227, 0.579],
                borderWidth: 1
            },
        ]

        // Hitung total data untuk setiap label
        var totalData = dataSets[0].data.map((value, index) => {
            return dataSets.reduce((accumulator, dataSet) => accumulator + dataSet.data[index], 0);
        });

        // Tambahkan dataset tambahan untuk total
        dataSets.push({
            label: 'Total',
            data: totalData,
            borderWidth: 1,
            type: 'line' // Tipe garis untuk dataset total
        });

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Agung', 'Deni', 'Acep', 'Tedi', 'Arif', 'Irma', 'Juna', 'Juni'],
                datasets: dataSets
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        min: 0
                    }
                }
            }
        });
    </script>
@endpush

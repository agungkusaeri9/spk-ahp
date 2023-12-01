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
                        <h4>Grafik Hasil</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart" height="80"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let getAlternatif = () => {
            let data = [];
            $.ajax({
                url: '{{ route('admin.alternatif.getJson') }}',
                type: 'GET',
                async: false,
                dataType: 'JSON',
                success: function(response) {
                    if (response.status == true) {
                        data = response.data;
                    }

                },
                error: function(err) {
                    console.log(err);
                }
            })
            return data;
        }
        let getKriteria = () => {
            let data = [];
            $.ajax({
                url: '{{ route('admin.kriteria.getJson') }}',
                type: 'GET',
                async: false,
                dataType: 'JSON',
                success: function(response) {
                    if (response.status == true) {
                        data = response.data;
                    }
                },
                error: function(err) {
                    console.log(err);
                }
            })
            return data;
        }

        let data_alternatif = getAlternatif();
        let data_kriteria = getKriteria();

        console.log(data_kriteria);

        const ctx = document.getElementById('myChart');
        let dataSets = [];
        let dataSets2 = [];

        data_kriteria.forEach(kriteria => {
            dataSets.push({
                label: kriteria.label,
                data: kriteria.data,
                borderWidth: 1
            });
        });

        // Hitung total data untuk setiap label
        let totalData = dataSets[0].data.map((value, index) => {
            return dataSets.reduce((accumulator, dataSet) => accumulator + dataSet.data[index], 0);
        });

        let data_label = data_alternatif.map(function(item) {
            return item.nama;
        });

        // Tambahkan dataset untuk total
        dataSets.push({
            label: 'Total',
            data: totalData,
            type: 'line', // Jenis dataset yang ditambahkan
            fill: false, // Tidak diisi agar menjadi garis
            borderWidth: 2 // Lebar garis
        });

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data_label,
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

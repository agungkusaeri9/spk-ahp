<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .center {
            text-align: center;
        }

        .highlight {
            background-color: #FFD700;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center">Laporan Hasil Perhitungan</h2>
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="dTable">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Nilai Kriteria</th>
                                <th>Ranking</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tbody>
                            @foreach ($sortedData as $item => $group)
                                <tr>
                                    <td class="align-middle text-left">{{ $group->first()->alternatif->kode }}
                                    </td>
                                    <td class="align-middle text-left">{{ $group->first()->alternatif->nama }}
                                    </td>
                                    <td>
                                        <table class="table">
                                            @foreach ($data_kriteria as $kriteria)
                                                <tr>
                                                    <td>{{ $kriteria->nama }}</td>
                                                    <td>

                                                        {{ getNilaiKriteria($group->first()->alternatif->id, $kriteria->id) }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr class=" bg-secondary">
                                                <th>Total</th>
                                                <th>
                                                    {{ totalNilaiKriteria($group->first()->alternatif->id) }}
                                                </th>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="text-align:center">
                                        {{ getRanking($group->first()->alternatif->id) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <h4>Kesimpulan</h4>
                    <p>
                        {!! $kesimpulan !!}
                    </p>

                </div>
            </div>
        </div>
    </div>
</body>

</html>

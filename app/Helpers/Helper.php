<?php

use App\Models\Alternatif;
use App\Models\AlternatifKriteria;
use App\Models\Kriteria;
use App\Models\PerbandinganKriteria;
use App\Models\PerbandinganSubKriteria;
use App\Models\SubKriteria;

function getIr($jumlah_kriteria)
{
    // Array IR (Index of Randomness) berdasarkan jumlah kriteria
    $irValues = [
        1 => 0.00,
        2 => 0.00,
        3 => 0.58,
        4 => 0.90,
        5 => 1.12,
        6 => 1.24,
        7 => 1.32,
        8 => 1.41,
        9 => 1.45,
        10 => 1.49,
        11 => 1.51,
        12 => 1.48,
        13 => 1.56,
        14 => 1.57,
        15 => 1.59,
    ];

    // Periksa apakah jumlah kriteria berada dalam rentang yang diperbolehkan
    if ($jumlah_kriteria >= 1 && $jumlah_kriteria <= 15) {
        return $irValues[$jumlah_kriteria];
    } else {
        // Jika jumlah kriteria di luar rentang yang diperbolehkan, dapatkan nilai IR untuk 15 kriteria
        return $irValues[15];
    }
}

function getNilaiPerbandinganKriteria($kriteria1, $kriteria2)
{
    $nilai = PerbandinganKriteria::where([
        'kriteria1_id' => $kriteria1,
        'kriteria2_id' => $kriteria2
    ])->first();

    if ($nilai) {
        return $nilai->nilai;
    }
}

function getNormalisasiNilaiKriteria($kriteria1, $kriteria2)
{
    $nilai = getNilaiPerbandinganKriteria($kriteria1, $kriteria2);
    $jumlah = totalNormalisasiKolom($kriteria2);
    $hasil = number_format($nilai / $jumlah, 3);
    return $hasil;
}

function totalNormalisasiKolom($kriteria2)
{
    $jumlah = PerbandinganKriteria::where('kriteria2_id', $kriteria2)->sum('nilai');
    return $jumlah;
}

function getJumlahNormalisasiBaris($kriteria1_id)
{
    $data_kriteria = Kriteria::orderBy('nama', 'ASC')->get();
    $jumlah = 0;
    foreach ($data_kriteria as $kriteria2) {
        $jumlah = $jumlah + getNormalisasiNilaiKriteria($kriteria1_id, $kriteria2->id);
    }
    return $jumlah;
}

function getPrioritasNormalisasiBaris($kriteria1_id)
{
    $data_kriteria = Kriteria::orderBy('nama', 'ASC')->get();
    $total_kriteria = Kriteria::count();
    $kriteria2 = PerbandinganKriteria::where('kriteria2_id', 1);
    $jumlah = 0;
    foreach ($data_kriteria as $kriteria2) {
        $jumlah = $jumlah + getNormalisasiNilaiKriteria($kriteria1_id, $kriteria2->id);
    }

    $prioritas = $jumlah / $total_kriteria;
    // return number_format($prioritas, 3);
    return $prioritas;
}

function getNilaiPenjumlahanBaris($kriteria1_id, $kriteria2_id, $prioritas_kriteria1_id)
{
    $prioritas = getPrioritasNormalisasiBaris($prioritas_kriteria1_id);
    $perbandingan_kriteria = PerbandinganKriteria::where([
        'kriteria1_id' => $kriteria1_id,
        'kriteria2_id' => $kriteria2_id
    ])->first();

    $hasil = $perbandingan_kriteria->nilai * $prioritas;
    // return number_format($hasil, 3);
    return $hasil;
}

function hitungJumlahMatrikPenjumlahanSetiapBaris($kriteria1_id)
{
    $data_kriteria = Kriteria::orderBy('nama', 'ASC')->get();
    $jumlah = 0;
    foreach ($data_kriteria as $kriteria2) {
        $jumlah = $jumlah + getNilaiPenjumlahanBaris($kriteria1_id, $kriteria2->id, $kriteria2->id);
    }
    return $jumlah;
}

function getHasilPerhitunganRasioKriteria($kriteria1_id)
{
    $jumlah_perbaris = hitungJumlahMatrikPenjumlahanSetiapBaris($kriteria1_id);
    $prioritas = getPrioritasNormalisasiBaris($kriteria1_id);
    $hasil = $jumlah_perbaris + $prioritas;
    // return number_format($hasil, 3);
    return $hasil;
}


function getTotalHasilRasioKonsistensi()
{
    $data_kriteria = Kriteria::orderBy('nama', 'ASC')->get();
    $hasil = 0;
    foreach ($data_kriteria as $kriteria1) {
        $jumlah_perbaris = hitungJumlahMatrikPenjumlahanSetiapBaris($kriteria1->id);
        $prioritas = getPrioritasNormalisasiBaris($kriteria1->id);
        $hasil = $hasil + $jumlah_perbaris + $prioritas;
    }
    // return number_format($hasil, 3);
    return $hasil;
}

function getLamdaMaxRasioKonsistensi()
{
    $jumlah_kriteria = Kriteria::count();
    $total_hasil_rasio_konsistensi = getTotalHasilRasioKonsistensi();

    $hasil = $total_hasil_rasio_konsistensi / $jumlah_kriteria;
    // return number_format($hasil, 3);
    return $hasil;
}

function getCiRasioKonsistensi()
{
    $lamda_max = getLamdaMaxRasioKonsistensi();
    $jumlah_kriteria = Kriteria::count();

    $hasil = ($lamda_max - $jumlah_kriteria) / ($jumlah_kriteria - 1);
    // return number_format($hasil, 3);
    return $hasil;
}


function getCrRasioKonsistensi()
{
    $jumlah_kriteria = Kriteria::count();
    $ci = getCiRasioKonsistensi();
    $ri = getIr($jumlah_kriteria);

    $hasil = $ci / $ri;
    // return number_format($hasil, 3);
    return $hasil;
}


// sub kriteria

function getNilaiPerbandinganSubKriteria($sub_kriteria1_id, $sub_kriteria2_id)
{
    $nilai = PerbandinganSubKriteria::where([
        'sub_kriteria1_id' => $sub_kriteria1_id,
        'sub_kriteria2_id' => $sub_kriteria2_id
    ])->first();

    if ($nilai) {
        return $nilai->nilai;
    } else {
        return 0;
    }
}

function totalNormalisasiKolomSubKriteria($sub_kriteria2)
{
    $jumlah = PerbandinganSubKriteria::where('sub_kriteria2_id', $sub_kriteria2)->sum('nilai');
    return $jumlah;
}


function getNormalisasiNilaiSubKriteria($sub_kriteria1, $sub_kriteria2)
{
    $nilai = getNilaiPerbandinganSubKriteria($sub_kriteria1, $sub_kriteria2);
    $jumlah = totalNormalisasiKolomSubKriteria($sub_kriteria2);
    $hasil = number_format($nilai / $jumlah, 3);
    return $hasil;
}

function getJumlahNormalisasiBarisSubKriteria($kriteria_id, $sub_kriteria1_id)
{
    $data_sub_kriteria = SubKriteria::where('kriteria_id', $kriteria_id)->orderBy('nama', 'ASC')->get();
    $jumlah = 0;
    foreach ($data_sub_kriteria as $sub_kriteria2) {
        $jumlah = $jumlah + getNormalisasiNilaiSubKriteria($sub_kriteria1_id, $sub_kriteria2->id);
    }
    return $jumlah;
}

function getPrioritasNormalisasiBarisSubKriteria($kriteria_id, $sub_kriteria1_id)
{
    $data_sub_kriteria = SubKriteria::where('kriteria_id', $kriteria_id)->get();
    $total_kriteria = $data_sub_kriteria->count();
    $jumlah = 0;
    foreach ($data_sub_kriteria as $sub_kriteria2) {
        $jumlah = $jumlah + getNormalisasiNilaiSubKriteria($sub_kriteria1_id, $sub_kriteria2->id);
    }

    $prioritas = $jumlah / $total_kriteria;
    // return number_format($prioritas, 3);
    return $prioritas;
}

function getPrioritasSubKriteriaNormalisasiBarisSubKriteria($kriteria_id, $sub_kriteria1_id)
{
    $data_sub_kriteria = SubKriteria::where('kriteria_id', $kriteria_id)->orderBy('nama', 'ASC')->get();
    $total_kriteria = $data_sub_kriteria->count();
    $jumlah = 0;
    foreach ($data_sub_kriteria as $sub_kriteria2) {
        $jumlah = $jumlah + getNormalisasiNilaiSubKriteria($sub_kriteria1_id, $sub_kriteria2->id);
    }

    $prioritas = $jumlah / $total_kriteria;
    // return number_format($prioritas, 3);
    return $prioritas;
}

function getNilaiMaksimumPrioritasSubKriteria($kriteria_id)
{
    $kriteria = Kriteria::findOrFail($kriteria_id);
    $data_sub_kriteria = SubKriteria::where('kriteria_id', $kriteria_id)->get();
    $maximum_value = 0; // Inisialisasi nilai maksimum
    foreach ($data_sub_kriteria as $sub_kriteria1) {
        $nilai_normalisasi = getPrioritasSubKriteriaNormalisasiBarisSubKriteria($kriteria->id, $sub_kriteria1->id);
        $maximum_value = max($maximum_value, $nilai_normalisasi);
    }

    // Jika Anda ingin mengembalikan nilai maksimum, gunakan $maximum_value
    // return number_format($maximum_value, 3);
    return $maximum_value;
}

function getPriotitasSubKriteria($kriteria_id, $sub_kriteria1_id)
{
    $prioritas = getPrioritasNormalisasiBarisSubKriteria($kriteria_id, $sub_kriteria1_id);
    $nilai_maksimum = getNilaiMaksimumPrioritasSubKriteria($kriteria_id);

    $hasil = $prioritas / $nilai_maksimum;
    // return number_format($hasil, 3);
    return $hasil;
}


function getNilaiPenjumlahanBarisSubKriteria($kriteria_id, $sub_kriteria1_id, $sub_kriteria2_id, $prioritas_sub_kriteria2_id)
{
    $prioritas = getPrioritasNormalisasiBarisSubKriteria($kriteria_id, $prioritas_sub_kriteria2_id);
    $perbandingan_kriteria = PerbandinganSubKriteria::where([
        'kriteria_id' => $kriteria_id,
        'sub_kriteria1_id' => $sub_kriteria1_id,
        'sub_kriteria2_id' => $sub_kriteria2_id
    ])->first();

    $hasil = $perbandingan_kriteria->nilai * $prioritas;
    // return number_format($hasil, 3);
    return $hasil;
}


function hitungJumlahMatrikPenjumlahanSubKriteriaSetiapBaris($kriteria_id, $sub_kriteria1_id)
{
    $data_sub_kriteria = SubKriteria::where('kriteria_id', $kriteria_id)->get();
    $jumlah = 0;
    foreach ($data_sub_kriteria as $sub_kriteria2) {
        $jumlah = $jumlah + getNilaiPenjumlahanBarisSubKriteria($kriteria_id, $sub_kriteria1_id, $sub_kriteria2->id, $sub_kriteria2->id);
    }
    return $jumlah;
}

function getHasilPerhitunganRasioSubKriteria($kriteria_id, $sub_kriteria1_id)
{
    $jumlah_perbaris = hitungJumlahMatrikPenjumlahanSubKriteriaSetiapBaris($kriteria_id, $sub_kriteria1_id);
    $prioritas = getPrioritasNormalisasiBarisSubKriteria($kriteria_id, $sub_kriteria1_id);
    $hasil = $jumlah_perbaris + $prioritas;
    // return number_format($hasil, 3);
    return $hasil;
}



function getTotalHasilRasioKonsistensiSubKriteria($kriteria_id)
{
    $data_sub_kriteria = SubKriteria::where('kriteria_id', $kriteria_id)->get();
    $hasil = 0;
    foreach ($data_sub_kriteria as $sub_kriteria1) {
        $jumlah_perbaris = hitungJumlahMatrikPenjumlahanSubKriteriaSetiapBaris($kriteria_id, $sub_kriteria1->id);
        $prioritas = getPrioritasNormalisasiBarisSubKriteria($kriteria_id, $sub_kriteria1->id);
        $hasil += $jumlah_perbaris + $prioritas;
    }
    // return number_format($hasil, 3);
    return $hasil;
}

function getLamdaMaxRasioKonsistensiSubKriteria($kriteria_id)
{
    $jumlah_kriteria = Kriteria::count();
    $total_hasil_rasio_konsistensi = getTotalHasilRasioKonsistensiSubKriteria($kriteria_id);

    $hasil = $total_hasil_rasio_konsistensi / $jumlah_kriteria;
    // return number_format($hasil, 3);
    return $hasil;
}

function getCiRasioKonsistensiSubKriteria($kriteria_id)
{
    $lamda_max = getLamdaMaxRasioKonsistensiSubKriteria($kriteria_id);
    $jumlah_kriteria = SubKriteria::where('kriteria_id', $kriteria_id)->count();

    $hasil = ($lamda_max - $jumlah_kriteria) / ($jumlah_kriteria - 1);
    // return number_format($hasil, 3);
    return $hasil;
}


function getCrRasioKonsistensiSubKriteria($kriteria_id)
{
    $jumlah_kriteria = SubKriteria::where('kriteria_id', $kriteria_id)->count();
    $ci = getCiRasioKonsistensiSubKriteria($kriteria_id);
    $ri = getIr($jumlah_kriteria);

    $hasil = $ci / $ri;
    // return number_format($hasil, 3);
    return $hasil;
}


function getNilaiKriteria($alternatif_id, $kriteria_id)
{
    $prioritas = getPrioritasNormalisasiBaris($kriteria_id);
    $alternatifKriteria = AlternatifKriteria::where([
        'alternatif_id' => $alternatif_id,
        'kriteria_id' => $kriteria_id
    ])->first();

    $prioritas_sub_kriteria = getPriotitasSubKriteria($kriteria_id, $alternatifKriteria->sub_kriteria->id);

    $hasil = $prioritas * $prioritas_sub_kriteria;
    // return number_format($hasil, 3);
    return $hasil;
}

function totalNilaiKriteria($alternatif_id)
{
    $data_kriteria = Kriteria::get();
    $jumlah = 0;
    foreach ($data_kriteria as $kriteria) {
        $prioritas = getPrioritasNormalisasiBaris($kriteria->id);
        $alternatifKriteria = AlternatifKriteria::where([
            'alternatif_id' => $alternatif_id,
            'kriteria_id' => $kriteria->id
        ])->first();
        $prioritas_sub_kriteria = getPriotitasSubKriteria($kriteria->id, $alternatifKriteria->sub_kriteria->id);
        $jumlah += $prioritas * $prioritas_sub_kriteria;
    }

    // return number_format($jumlah, 3);
    return $jumlah;
}

function getRanking($alternatif_id)
{
    // Mendapatkan total nilai kriteria untuk alternatif tertentu
    $total_nilai = totalNilaiKriteria($alternatif_id);

    // Mengambil semua alternatif
    $data_alternatif = Alternatif::get();

    // Inisialisasi variabel peringkat
    $peringkat = 1;

    // Menghitung peringkat untuk alternatif tertentu
    foreach ($data_alternatif as $alternatif) {
        if ($alternatif->id != $alternatif_id) {
            $nilai_alternatif = totalNilaiKriteria($alternatif->id);

            if ($nilai_alternatif > $total_nilai) {
                $peringkat++;
            }
        }
    }

    // Mengembalikan peringkat
    return $peringkat;
}


function getNilaiByKriteria($kriteria_id)
{
    $data_alternatif = Alternatif::orderBy('nama', 'ASC')->get();
    $data = [];

    $prioritas = getPrioritasNormalisasiBaris($kriteria_id);
    foreach ($data_alternatif as $alternatif) {
        $alternatifKriteria = AlternatifKriteria::where([
            'alternatif_id' => $alternatif->id,
            'kriteria_id' => $kriteria_id
        ])->first();
        $prioritas_sub_kriteria = getPriotitasSubKriteria($kriteria_id, $alternatifKriteria->sub_kriteria->id);

        $hasil = $prioritas * $prioritas_sub_kriteria;
        array_push($data, $hasil);
    }
    return $data;
}

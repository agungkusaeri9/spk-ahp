<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\AlternatifKriteria;
use App\Models\Kriteria;
use App\Models\Pengaturan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use stdClass;

class HasilController extends Controller
{
    public function index()
    {
        $data_alternatif = AlternatifKriteria::with('alternatif')->get()->groupBy('alternatif');
        $data_kriteria = Kriteria::orderBy('nama', 'ASC')->get();
        return view('admin.pages.hasil', [
            'title' => 'Hasil Perangkingan',
            'data_alternatif' => $data_alternatif,
            'data_kriteria' => $data_kriteria
        ]);
    }

    public function export()
    {
        $data_alternatif = AlternatifKriteria::with('alternatif')->get()->groupBy('alternatif');
        $data_kriteria = Kriteria::orderBy('nama', 'ASC')->get();
        $pengaturan = Pengaturan::first();
        $jml_pemenang = $pengaturan->jumlah_pemenang;
        $keterangan = $pengaturan->keterangan_kesimpulan;

        $sortedData = $data_alternatif->sortBy(function ($group) {
            return getRanking($group->first()->alternatif->id);
        });
        $twoLowestRankingData = $sortedData->take($jml_pemenang);
        // Ambil nama dari dua data pertama
        $nama_alternatif = [];

        foreach ($twoLowestRankingData as $jsonKey => $collection) {
            // Decode JSON key to get the object
            $object = json_decode($jsonKey);

            // Access the 'nama' property and add it to the $nama_alternatif array
            $nama_alternatif[] = $object->nama;
        }

        // Ambil pemenang terakhir
        $pemenangTerakhir = array_slice($nama_alternatif, -$jml_pemenang, $jml_pemenang);

        // Inisialisasi variabel untuk menyimpan hasil akhir
        $alternatifPemenang = '';

        // Logika kondisional untuk menangani berbagai jumlah pemenang
        if ($jml_pemenang == 1) {
            // Jika hanya satu pemenang
            $alternatifPemenang = $nama_alternatif[0];
        } elseif ($jml_pemenang == 2) {
            // Jika dua pemenang
            $alternatifPemenang = implode(' dan ', $pemenangTerakhir);
        } elseif ($jml_pemenang > 2) {
            // Jika lebih dari dua pemenang
            $alternatifPemenang = implode(', ', array_slice($pemenangTerakhir, 0, -1)) . ' dan ' . end($pemenangTerakhir);
        }

        // Ganti placeholder dengan nama alternatif
        $kesimpulan = str_replace('<alternatif_pemenang>', $alternatifPemenang, $keterangan);

        // Ganti placeholder dengan nama alternatif
        $kesimpulan = str_replace('<alternatif_pemenang>', $alternatifPemenang, $keterangan);
        $pdf = Pdf::loadView('admin.pages.hasil-pdf', [
            'sortedData' => $sortedData,
            'data_kriteria' => $data_kriteria,
            'kesimpulan' => $kesimpulan
        ])->setPaper('a4', 'landscape');
        $fileName = 'Hasil-perhitungan-spk-ahp-' . time() . '.pdf';
        // return $pdf->stream();
        return $pdf->download($fileName);
    }
}

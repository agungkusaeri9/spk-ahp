<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\PerbandinganKriteria;
use App\Models\PerbandinganSubKriteria;
use App\Models\SkalaNilai;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class MatrikPerbandinganSubKriteriaController extends Controller
{
    public function index()
    {
        $data_kriteria = Kriteria::orderBy('nama', 'ASC')->get();
        return view('admin.pages.perbandingan-sub-kriteria.index', [
            'title' => 'Matrik Perbandingan Kriteria Berpasangan',
            'data_kriteria' => $data_kriteria
        ]);
    }

    public function detail($kriteria_uuid)
    {
        $kriteria = Kriteria::where('uuid', $kriteria_uuid)->firstOrFail();
        $data_sub_kriteria = SubKriteria::where('kriteria_id', $kriteria->id)->orderBy('nama', 'ASC')->get();
        $data_skala = SkalaNilai::orderBy('nilai', 'ASC')->get();
        return view('admin.pages.perbandingan-sub-kriteria.detail', [
            'title' => 'Matrik Perbandingan Kriteria Berpasangan',
            'data_sub_kriteria' => $data_sub_kriteria,
            'data_skala' => $data_skala,
            'kriteria' => $kriteria
        ]);
    }

    public function hitung(Request $request, $kriteria_uuid)
    {
        $matriks = $request->input('matriks');
        $kriteria = Kriteria::where('uuid', $kriteria_uuid)->firstOrFail();
        foreach ($matriks as $sub_kriteria1_id => $values) {
            foreach ($values as $sub_kriteria2_id => $nilai_perbandingan) {
                // Simpan data ke dalam database
                PerbandinganSubKriteria::updateOrCreate(
                    ['kriteria_id' => $kriteria->id, 'sub_kriteria1_id' => $sub_kriteria1_id, 'sub_kriteria2_id' => $sub_kriteria2_id],
                    ['pemenang' => null, 'skala_nilai_id' => null, 'nilai' => $nilai_perbandingan]
                );
            }
        }


        return redirect()->route('admin.normalisasi-sub-kriteria', $kriteria->uuid)->with('success', 'Berhasil membandingkan!');
        // DB::beginTransaction();
        // try {
        //     $data_kriteria1 = $request->input('kriteria1');
        //     $data_kriteria2 = $request->input('kriteria2');

        //     foreach ($data_kriteria1 as $kriteria1_id) {
        //         foreach ($data_kriteria2 as $kriteria2_id) {
        //             $menang_key = "menang_{$kriteria1_id}_{$kriteria2_id}";
        //             $nilai_key = "nilai_{$kriteria1_id}_{$kriteria2_id}";

        //             $nilai_input = $request->input($nilai_key);

        //             if (!is_null($nilai_input) && is_array($nilai_input) && count($nilai_input) > 0) {
        //                 $nilai = $nilai_input[0];
        //             } else {
        //                 // Atau tentukan nilai default sesuai kebutuhan aplikasi Anda
        //                 $nilai = 0;
        //             }

        //             try {
        //                 // Cari SkalaNilai berdasarkan nilai
        //                 $skala_nilai = SkalaNilai::findOrFail($nilai);

        //                 // Dapatkan nilai perbandingan dari input
        //                 $nilai_perbandingan = $skala_nilai->nilai;

        //                 // Periksa apakah nilai_perbandingan seharusnya diubah menjadi 1/nilai
        //                 if ($nilai == 3) {
        //                     $nilai_perbandingan = 1 / $nilai_perbandingan;
        //                 }

        //                 // Debug: Cetak atau log data untuk memeriksa
        //                 \Log::info("Data Debug: Kriteria1: $kriteria1_id, Kriteria2: $kriteria2_id, Nilai: $nilai, Nilai Perbandingan: $nilai_perbandingan");

        //                 // Simpan data ke dalam database
        //                 PerbandinganKriteria::updateOrCreate(
        //                     ['kriteria1_id' => $kriteria1_id, 'kriteria2_id' => $kriteria2_id],
        //                     ['pemenang' => $request->input($menang_key)[0], 'skala_nilai_id' => $skala_nilai->id, 'nilai' => $nilai_perbandingan]
        //                 );

        //                 // Simpan juga perbandingan sebaliknya
        //                 PerbandinganKriteria::updateOrCreate(
        //                     ['kriteria1_id' => $kriteria2_id, 'kriteria2_id' => $kriteria1_id],
        //                     ['pemenang' => $request->input($menang_key)[0], 'skala_nilai_id' => $skala_nilai->id, 'nilai' => 1 / $nilai_perbandingan]
        //                 );
        //             } catch (ModelNotFoundException $e) {
        //                 // Tangani jika SkalaNilai tidak ditemukan
        //                 // Misalnya, kirim respons error atau lakukan tindakan lain sesuai kebutuhan aplikasi Anda
        //                 // Contoh: return response()->json(['error' => 'SkalaNilai not found'], 404);
        //             }
        //         }
        //     }

        //     DB::commit();
        //     dd('berhasil');
        //     return redirect()->back()->with('success', 'Berhasil Menghitung');
        // } catch (\Throwable $th) {
        //     DB::rollBack();
        //     throw $th;
        // }
    }

    public function normalisasi($kriteria_uuid)
    {
        $kriteria = Kriteria::where('uuid', $kriteria_uuid)->firstOrFail();
        $data_sub_kriteria = SubKriteria::whereHas('kriteria', function ($q) use ($kriteria_uuid) {
            $q->where('uuid', $kriteria_uuid);
        })->orderBy('nama', 'ASC')->get();
        return view('admin.pages.perbandingan-sub-kriteria.normalisasi', [
            'title' => 'Matrik Perbandingan Kriteria Berpasangan',
            'data_sub_kriteria' => $data_sub_kriteria,
            'kriteria' => $kriteria
        ]);
    }
}

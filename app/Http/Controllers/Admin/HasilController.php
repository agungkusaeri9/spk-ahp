<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\AlternatifKriteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;

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
}

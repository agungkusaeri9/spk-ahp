<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\AlternatifKriteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlternatifKriteriaController extends Controller
{
    public function index()
    {
        $data_alternatif = Alternatif::with('alternatif_kriteria')->orderBy('nama', 'ASC')->get();
        return view('admin.pages.alternatif-kriteria.index', [
            'title' => 'Alternatif Kriteria',
            'data_alternatif' => $data_alternatif,
        ]);
    }

    public function create($alternatif_uuid)
    {
        $data_kriteria = Kriteria::orderBy('nama', 'ASC')->get();
        $alternatif = Alternatif::where('uuid', $alternatif_uuid)->firstOrFail();
        return view('admin.pages.alternatif-kriteria.create', [
            'title' => 'Alternatif Kriteria',
            'alternatif' => $alternatif,
            'data_kriteria' => $data_kriteria,
        ]);
    }


    public function store()
    {
        DB::beginTransaction();
        try {
            $data_kriteria = request('kriteria_id');
            $data_sub_kriteria = request('sub_kriteria_id');
            // dd(request()->all());
            foreach ($data_kriteria as $key => $kriteria) {
                AlternatifKriteria::create([
                    'kriteria_id' => $kriteria,
                    'alternatif_id' => request('alternatif_id'),
                    'sub_kriteria_id' => $data_sub_kriteria[$key]
                ]);
            }
            DB::commit();
            return redirect()->route('admin.alternatif-kriteria.index')->with('success', 'Alternatif Kriteria berhasil dibuat.');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function edit($alternatif_uuid)
    {
        $data_kriteria = Kriteria::orderBy('nama', 'ASC')->get();
        $items = AlternatifKriteria::with('alternatif')->whereHas('alternatif', function ($q) use ($alternatif_uuid) {
            $q->where('uuid', $alternatif_uuid);
        })->get();
        return view('admin.pages.alternatif-kriteria.edit', [
            'title' => 'Alternatif Kriteria',
            'items' => $items,
            'data_kriteria' => $data_kriteria,
        ]);
    }

    public function update($alternatif_uuid)
    {
        DB::beginTransaction();
        try {

            $alternatif = Alternatif::where('uuid', $alternatif_uuid)->firstOrFail();
            $data_kriteria = request('kriteria_id');
            $data_sub_kriteria = request('sub_kriteria_id');
            $id = request('id');
            // dd(request()->all());
            foreach ($data_kriteria as $key => $kriteria) {
                AlternatifKriteria::where('id', $id[$key])->update([
                    'kriteria_id' => $kriteria,
                    'alternatif_id' => $alternatif->id,
                    'sub_kriteria_id' => $data_sub_kriteria[$key]
                ]);
            }
            DB::commit();
            return redirect()->route('admin.alternatif-kriteria.index')->with('success', 'Alternatif Kriteria berhasil diupdate.');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}

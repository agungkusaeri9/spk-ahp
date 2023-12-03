<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\AlternatifKriteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AlternatifKriteriaController extends Controller
{
    public function index()
    {
        $data_alternatif = Alternatif::with('alternatif_kriteria')->orderBy('nama', 'ASC')->get();
        return view('admin.pages.alternatif-kriteria.index', [
            'title' => 'Penilaian Alternatif',
            'data_alternatif' => $data_alternatif,
        ]);
    }

    public function create()
    {
        $data_kriteria = Kriteria::orderBy('nama', 'ASC')->get();
        return view('admin.pages.alternatif-kriteria.create', [
            'title' => 'Penilaian Alternatif',
            'data_kriteria' => $data_kriteria,
        ]);
    }


    public function store()
    {
        request()->validate([
            'nama' => ['required', 'unique:alternatif,nama'],
            'kode' => ['required', 'unique:alternatif,kode']
        ]);

        DB::beginTransaction();
        try {

            // insert alternatif
            $data_alternatif = request()->only(['nama', 'kode']);
            $data_alternatif['uuid'] = \Str::uuid();
            $alternatif = Alternatif::create($data_alternatif);

            $data_kriteria = request('kriteria_id');
            $data_sub_kriteria = request('sub_kriteria_id');
            // dd(request()->all());
            foreach ($data_kriteria as $key => $kriteria) {
                AlternatifKriteria::create([
                    'kriteria_id' => $kriteria,
                    'alternatif_id' => $alternatif->id,
                    'sub_kriteria_id' => $data_sub_kriteria[$key]
                ]);
            }
            DB::commit();
            return redirect()->route('admin.alternatif-kriteria.index')->with('success', 'Penilaian Alternatif berhasil dibuat.');
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
            'title' => 'Penilaian Alternatif',
            'items' => $items,
            'data_kriteria' => $data_kriteria,
        ]);
    }

    public function update($alternatif_uuid)
    {
        $alternatif = Alternatif::where('uuid', $alternatif_uuid)->firstOrFail();
        request()->validate([
            'nama' => ['required', Rule::unique('alternatif', 'nama')->ignore($alternatif->id)],
            'kode' => ['required', Rule::unique('alternatif', 'kode')->ignore($alternatif->id)]
        ]);
        DB::beginTransaction();
        try {
            $alternatif->update([
                'kode' => request('kode'),
                'nama' => request('nama')
            ]);
            $data_kriteria = request('kriteria_id');
            $data_sub_kriteria = request('sub_kriteria_id');
            $id = request('id');
            foreach ($data_kriteria as $key => $kriteria) {
                AlternatifKriteria::where('id', $id[$key])->update([
                    'kriteria_id' => $kriteria,
                    'alternatif_id' => $alternatif->id,
                    'sub_kriteria_id' => $data_sub_kriteria[$key]
                ]);
            }
            DB::commit();
            return redirect()->route('admin.alternatif-kriteria.index')->with('success', 'Penilaian Alternatif berhasil diupdate.');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function destroy($alternatif_uuid)
    {
        DB::beginTransaction();
        try {

            $alternatif = Alternatif::where('uuid', $alternatif_uuid)->firstOrFail();
            $alternatif->delete();
            DB::commit();
            return redirect()->route('admin.alternatif-kriteria.index')->with('success', 'Alternatif berhasil dihapus.');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}

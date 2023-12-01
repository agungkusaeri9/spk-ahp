<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternatif;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Alternatif::orderBy('nama', 'ASC')->get();
        return view('admin.pages.alternatif.index', [
            'title' => 'Data alternatif',
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.alternatif.create', [
            'title' => 'Tambah Alternatif'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nama' => ['required', 'unique:alternatif,nama'],
            'kode' => ['required', 'unique:alternatif,kode']
        ]);

        $data = request()->all();
        $data['uuid'] = \Str::uuid();
        Alternatif::create($data);
        return redirect()->route('admin.alternatif.index')->with('success', 'Alternatif berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getJson()
    {
        if (request()->ajax()) {
            $data_alternatif = Alternatif::orderBy('nama', 'ASC')->get();
            $data = $data_alternatif->map(function ($item) {
                $data_kriteria = Kriteria::orderBy('nama', 'ASC')->get();
                $mapped_kriteria = $data_kriteria->map(function ($kriteria) use ($item) {
                    return [
                        'nama' => $kriteria->nama,
                        'nilai' => getNilaiKriteria($item->id, $kriteria->id) // Ganti dengan nilai sesuai kebutuhan
                    ];
                });

                return [
                    'nama' => $item->nama,
                    'data_kriteria' => $mapped_kriteria->all()
                ];
            });

            if ($data) {
                return response()->json([
                    'status' => true,
                    'data' => $data
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'data' => []
                ]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $item = Alternatif::where('uuid', $uuid)->firstOrFail();
        return view('admin.pages.alternatif.edit', [
            'title' => 'Edit Alternatif',
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $data = request()->all();
        $item = Alternatif::where('uuid', $uuid)->firstOrFail();
        request()->validate([
            'nama' => ['required', Rule::unique('alternatif')->ignore($item->id)],
            'kode' => ['required', Rule::unique('alternatif')->ignore($item->id)],
        ]);
        $item->update($data);
        return redirect()->route('admin.alternatif.index')->with('success', 'Alternatif berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $item = Alternatif::where('uuid', $uuid)->firstOrFail();
        $item->delete();
        return redirect()->route('admin.alternatif.index')->with('success', 'Alternatif berhasil dihapus.');
    }
}

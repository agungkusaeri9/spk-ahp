<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Kriteria::orderBy('nama', 'ASC')->get();
        return view('admin.pages.kriteria.index', [
            'title' => 'Data Kriteria',
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
        return view('admin.pages.kriteria.create', [
            'title' => 'Tambah Kriteria'
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
            'nama' => ['required', 'unique:kriteria,nama'],
            'kode' => ['required', 'unique:kriteria,kode']
        ]);

        $data = request()->all();
        $data['uuid'] = \Str::uuid();
        Kriteria::create($data);
        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $item = Kriteria::where('uuid', $uuid)->firstOrFail();
        return view('admin.pages.kriteria.edit', [
            'title' => 'Edit Kriteria',
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
        $item = Kriteria::where('uuid', $uuid)->firstOrFail();
        request()->validate([
            'nama' => ['required', Rule::unique('kriteria')->ignore($item->id)],
            'kode' => ['required', Rule::unique('kriteria')->ignore($item->id)],
        ]);
        $item->update($data);
        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $item = Kriteria::where('uuid', $uuid)->firstOrFail();
        $item->delete();
        return redirect()->route('admin.kriteria.index')->with('success', 'Kriteria berhasil dihapus.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\SkalaNilai;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = SkalaNilai::orderBy('nilai', 'ASC')->get();
        return view('admin.pages.skala-nilai.index', [
            'title' => 'Data Nilai',
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
        return view('admin.pages.skala-nilai.create', [
            'title' => 'Tambah Nilai'
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
            'nilai' => ['required', 'unique:skala_nilai,nilai'],
            'nama' => ['required', 'unique:skala_nilai,nama'],
        ]);

        $data = request()->all();
        SkalaNilai::create($data);
        return redirect()->route('admin.nilai.index')->with('success', 'Nilai berhasil ditambahkan.');
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
    public function edit($id)
    {
        $item = SkalaNilai::where('id', $id)->firstOrFail();
        return view('admin.pages.skala-nilai.edit', [
            'title' => 'Edit Nilai',
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
    public function update(Request $request, $id)
    {
        $data = request()->all();
        $item = SkalaNilai::where('id', $id)->firstOrFail();
        request()->validate([
            'nilai' => ['required', Rule::unique('skala_nilai')->ignore($item->id)],
            'nama' => ['required', Rule::unique('skala_nilai')->ignore($item->id)],
        ]);
        $item->update($data);
        return redirect()->route('admin.nilai.index')->with('success', 'Nilai berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = SkalaNilai::where('id', $id)->firstOrFail();
        $item->delete();
        return redirect()->route('admin.nilai.index')->with('success', 'Nilai berhasil dihapus.');
    }
}

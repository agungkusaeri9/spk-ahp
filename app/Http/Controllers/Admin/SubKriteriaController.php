<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria_id = request('kriteria_id');
        if ($kriteria_id)
            $items = SubKriteria::with(['kriteria'])->where('kriteria_id', $kriteria_id)->orderBy('nama', 'ASC')->get();
        else
            $items = SubKriteria::with(['kriteria'])->orderBy('nama', 'ASC')->get();
        $data_kriteria = Kriteria::orderBy('nama', 'ASC')->get();
        return view('admin.pages.sub-kriteria.index', [
            'title' => 'Data Sub Kriteria',
            'items' => $items,
            'data_kriteria' => $data_kriteria
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_kriteria = Kriteria::with('subs')->orderBy('nama', 'ASC')->get();
        return view('admin.pages.sub-kriteria.create', [
            'title' => 'Tambah Sub Kriteria',
            'data_kriteria' => $data_kriteria
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
            'kriteria_id' => ['required'],
            'nama' => ['required'],
            'keterangan' => ['required']
        ]);

        $data = request()->all();
        $data['uuid'] = \Str::uuid();
        SubKriteria::create($data);
        return redirect()->route('admin.sub-kriteria.index')->with('success', 'Sub Kriteria berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getByKriteriaId()
    {
        if (request()->json()) {
            $kriteria_id = request('kriteria_id');
            $items = SubKriteria::with('kriteria')->where('kriteria_id', $kriteria_id)->orderBy('nama', 'ASC')->get();
            if ($items->count() > 0) {
                return response()->json([
                    'status' => true,
                    'data' => $items
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
        $item = SubKriteria::where('uuid', $uuid)->firstOrFail();
        $data_kriteria = Kriteria::orderBy('nama', 'ASC')->get();
        return view('admin.pages.sub-kriteria.edit', [
            'title' => 'Edit Sub Kriteria',
            'item' => $item,
            'data_kriteria' => $data_kriteria
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
        request()->validate([
            'kriteria_id' => ['required'],
            'nama' => ['required'],
            'keterangan' => ['required']
        ]);

        DB::beginTransaction();

        try {
            $data = request()->all();
            $item = SubKriteria::where('uuid', $uuid)->firstOrFail();
            $item->update($data);
            DB::commit();
            return redirect()->route('admin.sub-kriteria.index')->with('success', 'Sub Kriteria berhasil diupdate.');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->route('admin.sub-kriteria.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $item = SubKriteria::where('uuid', $uuid)->firstOrFail();
        $item->delete();
        return redirect()->route('admin.sub-kriteria.index')->with('success', 'Sub Kriteria berhasil dihapus.');
    }
}

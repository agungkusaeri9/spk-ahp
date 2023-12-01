<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengaturanController extends Controller
{
    public function index()
    {
        $item = Pengaturan::first();
        return view('admin.pages.pengaturan', [
            'title' => 'Pengaturan Web',
            'item' => $item
        ]);
    }

    public function update()
    {
        request()->validate([
            'nama_situs' => ['required'],
            'pembuat' => ['required'],
            'jumlah_pemenang' => ['required'],
            'deskripsi' => ['required'],
            'keterangan_kesimpulan' => ['required']
        ]);

        DB::beginTransaction();
        try {
            $data = request()->all();

            $pengaturan = Pengaturan::first();
            $pengaturan->update($data);

            DB::commit();
            return redirect()->route('admin.pengaturan.index')->with('success', 'Pengaturan berhasil diupdate.');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->route('admin.pengaturan.index')->with('error', $th->getMessage());
        }
    }
}

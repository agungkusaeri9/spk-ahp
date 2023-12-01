<?php

namespace Database\Seeders;

use App\Models\Pengaturan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengaturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengaturan::create([
            'nama_situs' => 'Sistem Pendukung Keputusan Pemilihan Beasiswa',
            'deskripsi' => 'Sistem Pendukung Keputusan Pemilihan Beasiswa berbasis web menggunakan laravel',
            'pembuat' => 'Agung Kusaeri',
            'keterangan_kesimpulan' => 'Berdasarkan perhitungan menggunakan metode Analytical Hierarchy Process (AHP) pada Sistem Pendukung Keputusan (SPK) untuk pemilihan beasiswa, dapat disimpulkan bahwa pendekatan ini memberikan hasil yang lebih terukur dan objektif. Dengan menetapkan Alternatif <> dan <> sebagai pemenangnya'
        ]);
    }
}

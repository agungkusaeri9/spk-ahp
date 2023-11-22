<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriteria1 = Kriteria::create([
            'uuid' => \Str::uuid(),
            'kode' => 'K1',
            'nama' => 'IPK'
        ]);
        $kriteria2 = Kriteria::create([
            'uuid' => \Str::uuid(),
            'kode' => 'K2',
            'nama' => 'Jumlah Penghasilan Orang Tua'
        ]);
        $kriteria1 = Kriteria::create([
            'uuid' => \Str::uuid(),
            'kode' => 'K3',
            'nama' => 'Jumlah Tanggungan Orang Tua'
        ]);
        $kriteria1 = Kriteria::create([
            'uuid' => \Str::uuid(),
            'kode' => 'K4',
            'nama' => 'Semester'
        ]);
    }
}

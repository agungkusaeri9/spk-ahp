<?php

namespace Database\Seeders;

use App\Models\SubKriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // kriteria 1
        SubKriteria::create([
            'kriteria_id' => 1,
            'uuid' => \Str::uuid(),
            'nama' => '4',
            'keterangan' => 'Sangat Baik'
        ]);
        SubKriteria::create([
            'kriteria_id' => 1,
            'uuid' => \Str::uuid(),
            'nama' => '3.60 - 3.90',
            'keterangan' => 'Baik'
        ]);
        SubKriteria::create([
            'kriteria_id' => 1,
            'uuid' => \Str::uuid(),
            'nama' => '3.00 - 3.50',
            'keterangan' => 'Cukup'
        ]);
        SubKriteria::create([
            'kriteria_id' => 1,
            'uuid' => \Str::uuid(),
            'nama' => '< 2.90',
            'keterangan' => 'Kurang'
        ]);

        // kriteria 2
        SubKriteria::create([
            'kriteria_id' => 2,
            'uuid' => \Str::uuid(),
            'nama' => '< 1.500.000',
            'keterangan' => 'Sangat Baik'
        ]);
        SubKriteria::create([
            'kriteria_id' => 2,
            'uuid' => \Str::uuid(),
            'nama' => '1.500.000 - 2.000.000',
            'keterangan' => 'Baik'
        ]);
        SubKriteria::create([
            'kriteria_id' => 2,
            'uuid' => \Str::uuid(),
            'nama' => '2.000.000 - 3.000.000',
            'keterangan' => 'Cukup'
        ]);
        SubKriteria::create([
            'kriteria_id' => 2,
            'uuid' => \Str::uuid(),
            'nama' => '> 3.000.000',
            'keterangan' => 'Kurang'
        ]);

        // kriteria 3
        SubKriteria::create([
            'kriteria_id' => 3,
            'uuid' => \Str::uuid(),
            'nama' => '> 4',
            'keterangan' => 'Sangat Baik'
        ]);
        SubKriteria::create([
            'kriteria_id' => 3,
            'uuid' => \Str::uuid(),
            'nama' => '4',
            'keterangan' => 'Baik'
        ]);
        SubKriteria::create([
            'kriteria_id' => 3,
            'uuid' => \Str::uuid(),
            'nama' => '3',
            'keterangan' => 'Cukup'
        ]);
        SubKriteria::create([
            'kriteria_id' => 3,
            'uuid' => \Str::uuid(),
            'nama' => '<= 2',
            'keterangan' => 'Kurang'
        ]);

        // kriteria 4
        SubKriteria::create([
            'kriteria_id' => 4,
            'uuid' => \Str::uuid(),
            'nama' => '3',
            'keterangan' => 'Sangat Baik'
        ]);
        SubKriteria::create([
            'kriteria_id' => 4,
            'uuid' => \Str::uuid(),
            'nama' => '4',
            'keterangan' => 'Baik'
        ]);
        SubKriteria::create([
            'kriteria_id' => 4,
            'uuid' => \Str::uuid(),
            'nama' => '5',
            'keterangan' => 'Cukup'
        ]);
        SubKriteria::create([
            'kriteria_id' => 4,
            'uuid' => \Str::uuid(),
            'nama' => '6',
            'keterangan' => 'Kurang'
        ]);
    }
}

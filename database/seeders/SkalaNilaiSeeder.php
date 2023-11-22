<?php

namespace Database\Seeders;

use App\Models\SkalaNilai;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkalaNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ahpScaleData = [
            1 => 'Sangat Tidak Penting',
            2 => 'Antara 1 dan 3',
            3 => 'Tidak Penting',
            4 => 'Antara 3 dan 5',
            5 => 'Cukup Penting',
            6 => 'Antara 5 dan 7',
            7 => 'Penting',
            8 => 'Antara 7 dan 9',
            9 => 'Sangat Penting',
        ];

        foreach ($ahpScaleData as $value => $label) {
            SkalaNilai::create([
                'nilai' => $value,
                'nama' => $label
            ]);
        }
    }
}

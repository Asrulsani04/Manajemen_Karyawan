<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Karyawan;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Karyawan::create([
            'name' => "Michael Jordan",
            'alamat' => "Jl. Sunda No.13",
            'nik' => "1234567891012673",
            'divisi' => "Marketing",
            'jabatan' => "Manager",
        ]);
    }
}

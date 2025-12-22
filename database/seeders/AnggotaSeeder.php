<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Anggota;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $anggotas = [
            [
                'nama' => 'Ahmad Rizki',
                'npm' => '2021001',
                'alamat' => 'Jl. Merdeka No. 10, Jakarta',
                'email' => 'ahmad.rizki@email.com',
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'npm' => '2021002',
                'alamat' => 'Jl. Sudirman No. 25, Bandung',
                'email' => 'siti.nurhaliza@email.com',
            ],
            [
                'nama' => 'Budi Santoso',
                'npm' => '2021003',
                'alamat' => 'Jl. Gatot Subroto No. 15, Surabaya',
                'email' => 'budi.santoso@email.com',
            ],
            [
                'nama' => 'Dewi Lestari',
                'npm' => '2021004',
                'alamat' => 'Jl. Ahmad Yani No. 30, Yogyakarta',
                'email' => 'dewi.lestari@email.com',
            ],
            [
                'nama' => 'Rudi Hartono',
                'npm' => '2021005',
                'alamat' => 'Jl. Diponegoro No. 5, Semarang',
                'email' => 'rudi.hartono@email.com',
            ],
        ];

        foreach ($anggotas as $anggota) {
            Anggota::create($anggota);
        }
    }
}

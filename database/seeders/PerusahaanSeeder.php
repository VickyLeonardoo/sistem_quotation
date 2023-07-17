<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Perusahaan;
class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $perusahaans = [
            [
                'kodePerusahaan' => 'PA',
                'namaPerusahaan' => 'Perusahaan A',
                'emailPerusahaan' => 'perusahaan.a@example.com',
                'alamatPerusahaan' => 'Batam Center',
                'telpPerusahaan' => '08127552',
                'picPerusahaan' => 'Piato Sinambela',
                'slug' => 'perusahaan-a',
            ],
            [
                'kodePerusahaan' => 'PB',
                'namaPerusahaan' => 'Perusahaan B',
                'emailPerusahaan' => 'perusahaan.b@example.com',
                'alamatPerusahaan' => 'Batam Center',
                'telpPerusahaan' => '08122252',
                'picPerusahaan' => 'Arion Pasaribu',
                'slug' => 'perusahaan-b',
            ],

            // Tambahkan data perusahaan lainnya sesuai kebutuhan
        ];

        foreach ($perusahaans as $perusahaan) {
            Perusahaan::create($perusahaan);
        }
    }
}

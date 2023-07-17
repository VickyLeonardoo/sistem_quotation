<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;
class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $produks = [
            [
                'kodeProduk' => 'B1',
                'namaProduk' => 'Baut',
                'hargaProduk' => '50000',
                'slug' => 'b1-baut',
            ],
            [
                'kodeProduk' => 'B2',
                'namaProduk' => 'Baut 2 mm',
                'hargaProduk' => '50000',
                'slug' => 'b2-baut-2-mm',
            ],
        ];

        foreach ($produks as $produk) {
            Produk::create($produk);
        }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        $this->call(PerusahaanSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProdukSeeder::class);
        $this->call(CvSeeder::class);
    }
}

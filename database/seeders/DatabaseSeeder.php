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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@mitra.com',
                'password' => bcrypt('12345'),
                'role' => '1',
            ],
            [
                'name' => 'Karyawan',
                'email' => 'karyawan@mitra.com',
                'password' => bcrypt('12345'),
                'role' => '2',

            ],

            // Tambahkan data perusahaan lainnya sesuai kebutuhan
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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

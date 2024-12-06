<?php

namespace Database\Seeders;

use App\Models\Rak;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            "user_id" => '1',
            "user_nama" => 'Admin',
            "user_alamat" => 'Alamat Admin',
            "user_username" => 'admin',
            "user_email" => 'admin@gmail.com',
            "user_notelp" => 123,
            "user_password" => Hash::make("admin"),
            "user_level" => "admin",
        ]);

        Rak::factory(10)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Jourdel Laluan",
            "email" => "jourdel0909@gmail.com",
            "role" => UserRole::Admin,
            "password" => Hash::make("Password123")
        ]);
    }
}

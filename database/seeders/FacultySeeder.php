<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Hana Vitaliz",
            "email" => "hanakathleenvitaliz1@gmai.com",
            "role" => UserRole::Faculty,
            "password" => Hash::make("Password123")
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'matsokakelv99@gmail.com'],
            [
                'name' => 'rolphe',
                'password' => Hash::make('Rolphe2000'),
            ]
        );
    }
}

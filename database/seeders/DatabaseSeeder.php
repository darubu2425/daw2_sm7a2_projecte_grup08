<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@clotfje.net',
            'password' => Hash::make('ClotFje2425#'),
            'role' => 'admin'
        ]);
        
        User::create([
            'name' => 'Consultor',
            'email' => 'consultor@clotfje.net',
            'password' => Hash::make('FjeClot2425@'),
            'role' => 'consultor'
        ]);
    }
}

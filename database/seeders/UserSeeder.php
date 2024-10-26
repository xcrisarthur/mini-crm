<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@solutif.com',
            'password' => Hash::make('Solutif100%'),
            'role_id' => $adminRole->id
        ]);
        User::create([
            'name' => 'Arthurito',
            'email' => 'Arthurito@gmail.com',
            'password' => Hash::make('password123'),
            'role_id' => 2,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
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
    }
}

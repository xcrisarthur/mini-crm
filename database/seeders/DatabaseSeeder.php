<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Employee;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Company::factory(10)->create();
        Employee::factory(50)->create();
        $this->call(RoleSeeder::class);
        $this->call(AdminUserSeeder::class);
    }
    
}

<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Role::create(['name' => 'Risk Manager']);
        Role::create(['name' => 'Risk Analyst']);
        Role::create(['name' => 'Another Role']);
        Role::create(['name' => 'Yet Another Role']);
    }
}

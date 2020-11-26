<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create(['school_type' => 'Admin']);
        Role::create(['school_type' => 'High School']);
        Role::create(['school_type' => 'Primary School']);
        Role::create(['school_type' => 'Marathi School']);
        Role::create(['school_type' => 'Accountant']);
        Role::create(['school_type' => 'Convent']);
    }
}

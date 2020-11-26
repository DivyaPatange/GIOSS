<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        $admin = Admin::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'mobile_no' => '1234567890',
            'password' => Hash::make('admin@admin.com'),
        ]);
    }
}

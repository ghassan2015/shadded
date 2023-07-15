<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminDBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'=>'admin admin',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('password'),
            'mobile'=>'+970567711720',
            'role_id'=>1,
            ]);
    }
}

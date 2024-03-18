<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::query()->create([
            'name' =>'Maha',
            'email' => 'maha@jobbly.com',
            'password' => Hash::make('P@ssword12'),
            'is_active' => 1,
            'phone' => '5000000000'
        ]);
//
    }
}

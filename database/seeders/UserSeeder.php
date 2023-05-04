<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username'   => 'dwiprayoga',
            'name'       => 'Dwi Prayoga',
            'email'      => 'dwiprayoga2701@gmail.com',
            'role'       => 1,
            'password'   => Hash::make('1234567890')
            // 'level'      => 'admin'
        ]);
    }
}

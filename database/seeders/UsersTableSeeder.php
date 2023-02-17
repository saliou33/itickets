<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'client',
            'email' => 'client@tickets.org',
            'password' => Hash::make('client'),
            'role_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'support',
            'email' => 'support@tickets.org',
            'password' => Hash::make('support'),
            'role_id' => 2
        ]);

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@tickets.org',
            'password' => Hash::make('admin'),
            'role_id' => 3
        ]);

    }
}

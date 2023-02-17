<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            ['id' => 1,'name' => 'CLIENT'],
            ['id' => 2, 'name' => 'SUPPORT'],
            ['id' => 3, 'name' => 'ADMIN']
        ];

        DB::table('roles')->insert($data);
    }
}

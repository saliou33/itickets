<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           $data = [
            ['id' => 1, 'name' => 'TECHNIQUE'],
            ['id' => 2, 'name' => 'SOCIAL'],
            ['id' => 3, 'name' => 'MAINTENANCE'],

        ];

        DB::table('categories')->insert($data);
    }
}

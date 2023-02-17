<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'name' => 'RECU'],
            ['id' => 2, 'name' => 'EN COURS'],
            ['id' => 3, 'name' => 'EN ATTENTE'],
            ['id' => 4, 'name' => 'NE PAS TRAITER'],
            ['id' => 5, 'name' => 'TERMINE'],
            ['id' => 6,'name' => 'CLOTURE'],
        ];

        DB::table('statuses')->insert($data);
    }
}

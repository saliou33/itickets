<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'RECU'],
            ['name' => 'EN COURS'],
            ['name' => 'EN ATTENTE'],
            ['name' => 'NE PAS TRAITER'],
            ['name' => 'TERMINE'],
            ['name' => 'CLOTURE'],
        ];

        DB::table('status')->insert($data);
    }
}

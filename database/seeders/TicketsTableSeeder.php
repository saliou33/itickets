<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'user_id' => 1, 'title' => 'Ticket Client', 'message' => 'Premier Ticket Client', 'created_at' => '2023-02-10',  'updated_at' => '2023-02-10'],
            ['id' => 2, 'user_id' => 2, 'title' => 'Ticket Support', 'message' => 'Premier Ticket Support', 'created_at' => '2023-02-10',  'updated_at' => '2023-02-10'],
            ['id' => 3, 'user_id' => 3, 'title' => 'Ticket Admin', 'message' => 'Premier Ticket Admin', 'created_at' => '2023-02-10',  'updated_at' => '2023-02-10'],
        ];

        DB::table('tickets')->insert($data);
    }
}

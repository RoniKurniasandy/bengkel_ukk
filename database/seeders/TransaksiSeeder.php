<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('transaksi')->insert([
            ['user_id' => 1, 'servis_id' => 1, 'total' => 250000, 'status' => 'selesai'],
            ['user_id' => 2, 'servis_id' => 2, 'total' => 150000, 'status' => 'proses'],
            ['user_id' => 3, 'servis_id' => 3, 'total' => 180000, 'status' => 'pending'],
        ]);
    }
}

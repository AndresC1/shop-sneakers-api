<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('purchases')->truncate();
        DB::table('purchases')->insert([
            [
                'code' => 'INV-20210720-0001WD',
                'user_id' => 1,
                'status' => 'pending',
                'total' => 1000,
                'discount' => 0,
                'tax' => 1000 * 0.15,
                'grand_total' => 1000 + (1000 * 0.15)
            ],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

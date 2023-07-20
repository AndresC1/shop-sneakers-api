<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSneakersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('size__sneakers')->truncate();
        DB::table('size__sneakers')->insert([
            ["size" => "7", "sneaker_id" => 1, "stock" => 10],
            ["size" => "7.5", "sneaker_id" => 1, "stock" => 0],
            ["size" => "8", "sneaker_id" => 1, "stock" => 4],
            ["size" => "9", "sneaker_id" => 1, "stock" => 2],
            ["size" => "11", "sneaker_id" => 1, "stock" => 8],
            ["size" => "12", "sneaker_id" => 1, "stock" => 1],
            ["size" => "13", "sneaker_id" => 1, "stock" => 0],
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

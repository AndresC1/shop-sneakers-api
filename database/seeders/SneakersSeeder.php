<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SneakersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('sneakers')->truncate();
        DB::table('sneakers')->insert([
            [
                "name" => "Nike Air Max 90",
                "code" => "nike-air-max-90",
                "brand" => "Nike",
                "color" => "White",
                "price" => "100",
                "description" => "The Nike Air Max 90 stays true to its OG running roots with the iconic Waffle outsole, stitched overlays and classic TPU accents. Fresh colours give a modern look while Max Air cushioning adds comfort to your journey.",
                "category" => "Sneakers",
                "gender" => "Men",
                "status" => "active"
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

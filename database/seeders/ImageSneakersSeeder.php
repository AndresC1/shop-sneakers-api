<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSneakersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('image__sneakers')->truncate();
        DB::table('image__sneakers')->insert([
            [
                "image" => "https://www.kicks.com.ni/media/catalog/product/c/z/cz5594-100-phsrh000-1000.png?optimize=medium&bg-color=255,255,255&fit=bounds&height=700&width=700&canvas=700:700&format=jpeg",
                "sneaker_id" => 1
            ],
            [
                "image" => "https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/bhwrvokud9flh34cchb8/calzado-air-max-90-R0p58M.png",
                "sneaker_id" => 1
            ],
            [
                "image" => "https://m.media-amazon.com/images/I/71+4ipvhSyL._AC_UX575_.jpg",
                "sneaker_id" => 1
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

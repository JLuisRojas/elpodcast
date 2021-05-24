<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('categories')->insert([
            'name' => "Tecnología",
            'image' => "cat_1.png",
        ]);

        // 2
        DB::table('categories')->insert([
            'name' => "Negocios",
            'image' => "cat_2.png",
        ]);

        // 3
        DB::table('categories')->insert([
            'name' => "Comedia",
            'image' => "cat_3.png",
        ]);

        // 4
        DB::table('categories')->insert([
            'name' => "Educacional",
            'image' => "cat_4.png",
        ]);

        // 5
        DB::table('categories')->insert([
            'name' => "Salud",
            'image' => "cat_5.png",
        ]);

        // 6
        DB::table('categories')->insert([
            'name' => "Cultura",
            'image' => "cat_6.png",
        ]);
    }
}

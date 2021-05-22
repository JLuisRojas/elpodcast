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
        ]);

        // 2
        DB::table('categories')->insert([
            'name' => "Negocios",
        ]);

        // 3
        DB::table('categories')->insert([
            'name' => "Comedia",
        ]);

        // 4
        DB::table('categories')->insert([
            'name' => "Educacional",
        ]);

        // 5
        DB::table('categories')->insert([
            'name' => "Salud",
        ]);

        // 6
        DB::table('categories')->insert([
            'name' => "Cultura",
        ]);
    }
}

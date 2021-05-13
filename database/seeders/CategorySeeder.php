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
        DB::table('categories')->insert([
            'name' => "Tecnología",
        ]);

        DB::table('categories')->insert([
            'name' => "Negocios",
        ]);

        DB::table('categories')->insert([
            'name' => "Comedia",
        ]);

        DB::table('categories')->insert([
            'name' => "Educacional",
        ]);

        DB::table('categories')->insert([
            'name' => "Salud",
        ]);

        DB::table('categories')->insert([
            'name' => "Cultura",
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User
        DB::table('users')->insert([
            'name' => "Luis",
            'email' => 'luis@elpodcast.com',
            'password' => Hash::make('prueba'),
        ]);

        DB::table('users')->insert([
            'name' => "Test Data",
            'email' => 'test@elpodcast.com',
            'password' => Hash::make('prueba'),
            'creator' => 1,
        ]);
    }
}

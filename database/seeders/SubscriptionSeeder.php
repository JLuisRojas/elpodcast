<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->insert([
            'podcast_id' => "1",
            'user_id' => '1',
            'date' => "2021-05-20",
        ]);

        DB::table('subscriptions')->insert([
            'podcast_id' => "5",
            'user_id' => '1',
            'date' => "2021-05-20",
        ]);
    }
}

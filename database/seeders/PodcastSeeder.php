<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PodcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Lex Fridman Podcast
        DB::table('podcasts')->insert([
            'user_id' => 2,
            'category_id' => 1,
            'title' => 'The Lex Fridman Podcast',
            'hosts' => 'Lex Fridman',
            'short_description' => 'Conversations about the nature of intelligence, consciousness, love, and power.',
            'long_description' => 'Conversations about science, technology, history, philosophy and the nature of intelligence, consciousness, love, and power. Lex is an AI researcher at MIT and beyond.',
            'image' => 'podcast_1_image.jpg',
        ]);

        // The Huberman Lab Podcast
        DB::table('podcasts')->insert([
            'user_id' => 2,
            'category_id' => 4,
            'title' => 'The Huberman Lab Podcast',
            'hosts' => 'Andrew Huberman',
            'short_description' => 'The Huberman Lab Podcast discusses Neuroscience.',
            'long_description' => 'The Huberman Lab Podcast discusses Neuroscience: how our brain and its connections with the organs of our body controls our perceptions, our behaviors, and our health. We also discuss existing and emerging tools.',
            'image' => 'podcast_2_image.jpg',
        ]);

        // Naval Podcast
        DB::table('podcasts')->insert([
            'user_id' => 2,
            'category_id' => 2,
            'title' => 'Naval Podcast',
            'hosts' => 'Naval Ravikant',
            'short_description' => 'On Twitter at @naval.',
            'long_description' => 'On Twitter at @naval.',
            'image' => 'podcast_3_image.jpg',
        ]);
    }
}

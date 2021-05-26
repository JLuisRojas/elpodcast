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

        // Rich Roll Podcast
        DB::table('podcasts')->insert([
            'user_id' => 2,
            'category_id' => 5,
            'hosts' => 'Rich Roll',
            'title' => 'The Rich Roll Podcast',
            'short_description' => 'An ultra-athlete, wellness evangelist and bestselling author Rich Roll.',
            'long_description' => 'Each week Rich delves deep into all things wellness with some of the brightest and most forward thinking, paradigm busting minds in health, fitness, nutrition, art, entertainment, entrepreneurship & spirituality.',
            'image' => 'podcast_4_image.jpg',
        ]);

        // The Anthropocene Reviewed
        DB::table('podcasts')->insert([
            'user_id' => 2,
            'category_id' => 6,
            'hosts' => 'John Green',
            'title' => 'The Anthropocene Reviewed',
            'short_description' => 'John Green reviews facets of the human-centered planet on a five-star scale.',
            'long_description' => 'The Anthropocene is the current geological age, in which human activity has profoundly shaped the planet and its biodiversity. On The Anthropocene Reviewed, #1 New York Times bestselling author John Green (The Fault in Our Stars, Turtles All the Way Down) reviews different facets',
            'image' => 'podcast_5_image.jpg',
        ]);
        
        // La Cotorrisa
        DB::table('podcasts')->insert([
            'user_id' => 2,
            'category_id' => 3,
            'hosts' => 'Ricardo Perez y Slobotzky ',
            'title' => 'La Cotorrisa',
            'short_description' => 'Ricardo Perez y Slobotzky se ponen a cotorrear como siempre.',
            'long_description' => 'Ricardo Perez y Slobotzky se ponen a cotorrear como siempre, pero ahora lo están grabando. Escuchalos todos los miercoles hablando de noticias extrañas, datos curiosos, anecdotas hilarantes y aliviana el ombligo de la semana.',
            'image' => 'podcast_6_image.jpg',
        ]);

        // Leyendas Legendarias
        DB::table('podcasts')->insert([
            'user_id' => 2,
            'category_id' => 3,
            'hosts' => 'Jose Antonio Badia y Eduardo Espinosa',
            'title' => 'Leyendas Legendarias',
            'short_description' => 'Un podcast de comedia donde cada semana exploraremos historias de asesinos en serie, fantasmas y eventos historicos peculiares, notorios o fantasticos.',
            'long_description' => 'Un podcast de comedia donde cada semana exploraremos historias de asesinos en serie, fantasmas y eventos historicos peculiares, notorios o fantasticos.',
            'image' => 'podcast_7_image.jpg',
        ]);

        // El Dollop
        DB::table('podcasts')->insert([
            'user_id' => 2,
            'category_id' => 6,
            'hosts' => 'Jose Antonio Badia y Eduardo Espinosa',
            'title' => 'El Dollop',
            'short_description' => 'Eduardo Espinosa y Jose Antonio Badia toman un suceso historico americano y lo examinan.',
            'long_description' => 'Eduardo Espinosa y Jose Antonio Badia toman un suceso historico americano y lo examinan.',
            'image' => 'podcast_8_image.jpg',
        ]);

        // Los Emprendeduros
        DB::table('podcasts')->insert([
            'user_id' => 2,
            'category_id' => 2,
            'hosts' => 'Alejandro Salomon y Rodrigo Navarro',
            'title' => 'Emprendeduros',
            'short_description' => 'Una conversacion para aprender de negocios, la economia, finanzas y mucho mas',
            'long_description' => 'Una conversacion para aprender de negocios, la economia, finanzas y mucho mas',
            'image' => 'podcast_9_image.jpg',
        ]);
    }
}

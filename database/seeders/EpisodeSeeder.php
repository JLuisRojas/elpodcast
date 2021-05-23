<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //===========================================================
        // Lex fridman Podcast
        
        DB::table('episodes')->insert([
            'podcast_id' => 1,
            'title' => 'Robert Breedlove: Philosophy of Bitcoin from First Principles',
            'description' => 'Robert Breedlove is a decentralized finance entrepreneur, philosopher, and podcaster.',
            'image' => 'podcast_1_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-04-17'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 1,
            'title' => 'Risto Miikkulainen: Neuroevolution and Evolutionary Computation',
            'description' => 'Risto Miikkulainen is a computer scientist at UT Austin',
            'image' => 'podcast_1_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-04-19'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 1,
            'title' => 'Michael Malice and Yaron Brook: Ayn Rand, Human Nature, and Anarchy',
            'description' => 'Michael Malice is an anarchist. Yaron Brook is an objectivist. Both are podcasters and authors.',
            'image' => 'podcast_1_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-04-24'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 1,
            'title' => 'Georges St-Pierre: The Science of Fighting',
            'description' => 'Georges St-Pierre is a martial artist.',
            'image' => 'podcast_1_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-04-25'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 1,
            'title' => 'Jeremi Suri: History of American Power',
            'description' => 'Jeremi Suri is a historian at UT Austin.',
            'image' => 'podcast_1_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-04-29'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 1,
            'title' => 'Sergey Nazarov: Chainlink, Smart Contracts, and Oracle Networks',
            'description' => 'Sergey Nazarov is the Co-Founder of Chainlink, a decentralized oracle network that provides data to smart contracts.',
            'image' => 'podcast_1_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-01'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 1,
            'title' => 'John Danaher: The Path to Mastery in Jiu Jitsu, Grappling, Judo, and MMA',
            'description' => 'John Danaher is a coach, scholar, and educator of jiu jitsu, submission grappling, judo, MMA, and the martial arts.',
            'image' => 'podcast_1_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-09'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 1,
            'title' => 'Po-Shen Loh: Mathematics, Math Olympiad, Combinatorics & Contact Tracing',
            'description' => 'Po-Shen Loh is a mathematician at CMU and coach of the USA International Math Olympiad team.',
            'image' => 'podcast_1_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-14'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 1,
            'title' => 'Katherine de Kleer: Planets, Moons, Asteroids & Life in Our Solar System',
            'description' => 'Katherine de Kleer is a professor of Planetary Science and Astronomy at Caltech.',
            'image' => 'podcast_1_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-17'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 1,
            'title' => 'Sam Harris: Consciousness, Free Will, Psychedelics, AI, UFOs, and Meaning',
            'description' => 'Sam Harris is an author, podcaster, and philosopher.',
            'image' => 'podcast_1_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-20'
        ]);

        //===========================================================
    
        //===========================================================
        // Huberman Lab Podcast
        
        DB::table('episodes')->insert([
            'podcast_id' => 2,
            'title' => 'How to Learn Skills Faster',
            'description' => 'This episode I discuss the science and practice of learning physical skills: what it involves at a biological level, and what to focus on during skill learning at each stage',
            'image' => 'podcast_2_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-04-17'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 2,
            'title' => 'Supercharge Exercise Performance & Recovery with Cooling',
            'description' => 'This episode I explain the science of heating and cooling the body, a process called thermoregulation',
            'image' => 'podcast_2_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-04-10'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 2,
            'title' => 'Using Cortisol & Adrenaline to Boost Our Energy & Immune System Function',
            'description' => 'This episode I describe the biology of two essential hormones we all make: cortisol and adrenaline',
            'image' => 'podcast_2_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-04-3'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 2,
            'title' => 'How to Control Your Metabolism by Thyroid & Growth Hormone',
            'description' => 'This episode I discuss metabolism and how our thyroid hormone and growth hormone control our metabolism.',
            'image' => 'podcast_2_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-03-26'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 2,
            'title' => 'How Our Hormones Control Our Hunger, Eating & Satiety',
            'description' => 'This episode I discuss how hormones from our gut, liver, pancreas and brain control our appetite.',
            'image' => 'podcast_2_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-03-19'
        ]);

        //===========================================================
        
        //===========================================================
        // Naval Podcast
        
        DB::table('episodes')->insert([
            'podcast_id' => 3,
            'title' => 'Pessimism Seems Like an Intellectually Serious Position',
            'description' => 'If you are an academic, being able to explain all of the problems that are out there and how dangerous these problems are and why you need funding',
            'image' => 'podcast_3_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-17'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 3,
            'title' => 'It is Easy to Extrapolate How Things Will Get Worse',
            'description' => 'A lot of the theories as to why we are imminently going to create an AGI are based in a naive extrapolation of computational power.',
            'image' => 'podcast_3_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-14'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 3,
            'title' => 'We are All Equal in Our Infinite Ignorance',
            'description' => 'Induction says that prediction is the main reason science exists, but it is really explanation.',
            'image' => 'podcast_3_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-12'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 3,
            'title' => 'It is Rare to Have Competing, Viable, Scientific Theories',
            'description' => 'There is also Solomonoffs theory of induction.',
            'image' => 'podcast_3_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-11'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 3,
            'title' => 'Science Advances One Funeral at a Time',
            'description' => 'There is some deep symmetry between multiverse theory and Feynman path integrals, right?',
            'image' => 'podcast_3_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-7'
        ]);

        //===========================================================
        
        //===========================================================
        // Rich Roll Podcast
        
        DB::table('episodes')->insert([
            'podcast_id' => 4,
            'title' => 'What does your podcast do?',
            'description' => "Adam Skolnick and I discuss my week in Minneapolis, the future of 'cultured meat'",
            'image' => 'podcast_4_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-04-29'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 4,
            'title' => 'Adventure Is A Human Right: Anthony Taylor',
            'description' => "Outdoor activist & youth educator Anthony Taylor joins me for a discussion on the transformative power of adventure",
            'image' => 'podcast_4_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-3'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 4,
            'title' => 'Sleep Is Non-Negotiable: Dr. Matthew Walker',
            'description' => "Your bad sleep habits are making you sick. Neuroscientist Matthew Walker joins me to explain why sleep is integral",
            'image' => 'podcast_4_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-10'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 4,
            'title' => 'The Tortoise Always Beats The Hare (at Life)',
            'description' => "Hustle culture is anathema to long-term success. To succeed long-term, slow & steady takes the prize every time.",
            'image' => 'podcast_4_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-13'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 4,
            'title' => 'Brogan Graham Is A Friend Hunter',
            'description' => "Rich & November Project co-founder Brogan Graham rekindle their bromance & talk friendship.",
            'image' => 'podcast_4_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-17'
        ]);
        
        //===========================================================
        
        //===========================================================
        // The Anthropocene Podcast
        
        DB::table('episodes')->insert([
            'podcast_id' => 5,
            'title' => "You'll Never Walk Alone and Jerzy Dudek",
            'description' => "John Green reviews the song You'll Never Walk Alone",
            'image' => 'podcast_5_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2020-05-28'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 5,
            'title' => "Seventeen Listener Suggestions, Reviewed",
            'description' => "John Green reviews seventeen topics suggested by listeners.",
            'image' => 'podcast_5_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2020-06-25'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 5,
            'title' => "Mortification and Civilization",
            'description' => "John Green reviews mortification and civilization.",
            'image' => 'podcast_5_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2020-07-30'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 5,
            'title' => "The Anthropocene Reviewed, Reviewed",
            'description' => "John Green reviews the podcast The Anthropocene Reviewed.",
            'image' => 'podcast_5_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2020-08-27'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 5,
            'title' => "Plague",
            'description' => "John Green reviews historical outbreaks of bubonic and pneumonic plague",
            'image' => 'podcast_5_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2020-09-24'
        ]);

        //===========================================================
        
        //===========================================================
        // The Anthropocene Podcast

        DB::table('episodes')->insert([
            'podcast_id' => 6,
            'title' => "Episodio 111 - Mi mascota es una vibora de cascabel",
            'description' => "Bienvenidos al episodio 111, donde hablamos de las anecdotas más sorprendentes que te ha pasado con tus papas.",
            'image' => 'podcast_6_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-5'
        ]);

        DB::table('episodes')->insert([
            'podcast_id' => 6,
            'title' => "Anecdotario 89 - Nos besamos vomitados Ft. Arigameplays",
            'description' => "Bienvenidos al anecdotario 89 de la Cotorrisa, tuvimos a una excelente gamer y amiga Arigameplays",
            'image' => 'podcast_6_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-9'
        ]);

        db::table('episodes')->insert([
            'podcast_id' => 6,
            'title' => "La Cotorrisa - Episodio 112 - Grupo Marrano en la fiesta familiar",
            'description' => "En este episodio les pedimos a los cotorros sus mejores y peores anecdotas de las canciones que dedicaron o les dedicaron",
            'image' => 'podcast_6_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-12'
        ]);

        db::table('episodes')->insert([
            'podcast_id' => 6,
            'title' => "Anecdortario 90 - Me cerraron la cajuela en la cabeza Ft. La India Yuridia",
            'description' => "Bienvenido al anecdotario número 90, en este episodio tuvimos invitada de lujo. La India Yuridia!",
            'image' => 'podcast_6_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-17'
        ]);

        db::table('episodes')->insert([
            'podcast_id' => 6,
            'title' => "Episodio 113 - No sabía que estaba embarazada",
            'description' => "Bienvenido al episodio numero 113 de la cotorrisa, en este capitulo estamos muy contentos por que rappi se unio a patrocinarnos",
            'image' => 'podcast_6_image.jpg',
            'audio' => 'podcast_1_episode_1_audio.mp3',
            'publish_date' => '2021-05-22'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StreamerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('streamers')->insert([
            'user_id' => 2,
            'country_id' => 1,
            'streamer_nick' => 'Pepeneitor',
            'streamer_nif' => '12345678A',
            'streamer_platform' => 'Twitch',
            'streamer_revenue' => 0,
            'has_active_campaigns' => false,
            'image_stream' => 'https://marketing4ecommerce.net/wp-content/uploads/2020/08/Twitch-Studio.jpg',
        ]);

        DB::table('streamers')->insert([
            'user_id' => 3,
            'country_id' => 2,
            'streamer_nick' => 'Juanete',
            'streamer_nif' => '12345678B',
            'streamer_platform' => 'Twitch',
            'streamer_revenue' => 0,
            'has_active_campaigns' => false,
            'image_stream' => 'https://marketing4ecommerce.net/wp-content/uploads/2020/08/Twitch-Studio.jpg',
        ]);

        DB::table('streamers')->insert([
            'user_id' => 4,
            'country_id' => 3,
            'streamer_nick' => 'Maria',
            'streamer_nif' => '12345678C',
            'streamer_platform' => 'Twitch',
            'streamer_revenue' => 0,
            'has_active_campaigns' => false,
            'image_stream' => 'https://marketing4ecommerce.net/wp-content/uploads/2020/08/Twitch-Studio.jpg',
        ]);

        DB::table('streamers')->insert([
            'user_id' => 5,
            'country_id' => 4,
            'streamer_nick' => 'PacoTron',
            'streamer_nif' => '12345678D',
            'streamer_platform' => 'Twitch',
            'streamer_revenue' => 0,
            'has_active_campaigns' => false,
            'image_stream' => 'https://marketing4ecommerce.net/wp-content/uploads/2020/08/Twitch-Studio.jpg',
        ]);

        DB::table('streamers')->insert([
            'user_id' => 6,
            'country_id' => 5,
            'streamer_nick' => 'Andretina',
            'streamer_nif' => '12345678E',
            'streamer_platform' => 'Twitch',
            'streamer_revenue' => 0,
            'has_active_campaigns' => false,
            'image_stream' => 'https://marketing4ecommerce.net/wp-content/uploads/2020/08/Twitch-Studio.jpg',
        ]);

        DB::table('streamers')->insert([
            'user_id' => 10,
            'country_id' => 6,
            'streamer_nick' => 'KillerMan',
            'streamer_nif' => '12345678F',
            'streamer_platform' => 'Twitch',
            'streamer_revenue' => 0,
            'has_active_campaigns' => false,
            'image_stream' => 'https://marketing4ecommerce.net/wp-content/uploads/2020/08/Twitch-Studio.jpg',
        ]);

        DB::table('streamers')->insert([
            'user_id' => 11,
            'country_id' => 2,
            'streamer_nick' => 'Roubinho',
            'streamer_nif' => '12345678G',
            'streamer_platform' => 'Twitch',
            'streamer_revenue' => 0,
            'has_active_campaigns' => false,
            'image_stream' => 'https://marketing4ecommerce.net/wp-content/uploads/2020/08/Twitch-Studio.jpg',
        ]);

        DB::table('streamers')->insert([
            'user_id' => 12,
            'country_id' => 4,
            'streamer_nick' => 'Mancuso',
            'streamer_nif' => '12345678H',
            'streamer_platform' => 'Twitch',
            'streamer_revenue' => 0,
            'has_active_campaigns' => false,
            'image_stream' => 'https://marketing4ecommerce.net/wp-content/uploads/2020/08/Twitch-Studio.jpg',
        ]);

        DB::table('streamers')->insert([
            'user_id' => 13,
            'country_id' => 5,
            'streamer_nick' => 'Pepito',
            'streamer_nif' => '12345678I',
            'streamer_platform' => 'Twitch',
            'streamer_revenue' => 0,
            'has_active_campaigns' => true,
            'image_stream' => 'https://marketing4ecommerce.net/wp-content/uploads/2020/08/Twitch-Studio.jpg',
        ]);

        DB::table('streamers')->insert([
            'user_id' => 14,
            'country_id' => 1,
            'streamer_nick' => 'USilvia',
            'streamer_nif' => '12345678I',
            'streamer_platform' => 'Twitch',
            'streamer_revenue' => 0,
            'has_active_campaigns' => true,
            'image_stream' => 'https://marketing4ecommerce.net/wp-content/uploads/2020/08/Twitch-Studio.jpg',
        ]);





    }
}

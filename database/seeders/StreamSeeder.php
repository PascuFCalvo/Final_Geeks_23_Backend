<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StreamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('streams')->insert([
            'streamer_id' => 1,
            'stream_title' => 'Stream Fortnite torneo',
            'stream_description' => 'Torneo de Fortnite con premio de 1000€',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 10000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2'=>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 1,
            'country_id' => 2,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 2,
            'stream_title' => 'Overwatch nuevo heroe',
            'stream_description' => 'Presentacion del nuevo heroe de Overwatch',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 12000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2'=>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 2,
            'country_id' => 1,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 3,
            'stream_title' => 'Alan wake, hoy me lo paso',
            'stream_description' => 'Hoy me paso el juego de Alan Wake, que ganas tenia',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 5000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2'=>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 4,
            'country_id' => 3,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 4,
            'stream_title' => 'Jump King, el juego mas dificil del mundo',
            'stream_description' => 'Hoy no me caigo ni una vez, lo prometo',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 3000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2'=>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 3,
            'country_id' => 4,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 5,
            'stream_title' => 'Call of dutty MW3',
            'stream_description' => 'Hoy le damos a la campaña del MW3',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 10000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2'=>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 1,
            'country_id' => 5,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 1,
            'stream_title' => 'League of Legends',
            'stream_description' => 'Hoy jugamos con los viewers',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 20000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2'=>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 2,
            'country_id' => 6,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 2,
            'stream_title' => 'Hearthstone',
            'stream_description' => 'Hoy jugamos con los viewers',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 2000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2'=>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 2,
            'country_id' => 1,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 3,
            'stream_title' => 'CS:GO',
            'stream_description' => 'Subimos a global hoy',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 10000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2'=>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 2,
            'country_id' => 1,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 4,
            'stream_title' => 'FIFA 21',
            'stream_description' => 'Abriendo sobres',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 9000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2'=>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 3,
            'country_id' => 4,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 5,
            'stream_title' => 'Valorant',
            'stream_description' => 'Hoy jugamos con los viewers',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 10000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2' =>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 3,
            'country_id' => 5,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 1,
            'stream_title' => 'Fortnite',
            'stream_description' => 'Hoy jugamos con los viewers',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 10000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2' =>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 4,
            'country_id' => 6,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 2,
            'stream_title' => 'Just Chatting',
            'stream_description' => 'De Chill hablando del tiempo',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 60000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2' =>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 3,
            'country_id' => 1,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 3,
            'stream_title' => 'CS:GO',
            'stream_description' => 'Subimos a global hoy',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 35000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2' =>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 2,
            'country_id' => 2,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 4,
            'stream_title' => 'FIFA 21',
            'stream_description' => 'Abriendo sobres',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 20000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2' =>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 1,
            'country_id' => 3,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 5,
            'stream_title' => 'Valorant',
            'stream_description' => 'Hoy jugamos con los viewers',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 10000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2' =>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 4,
            'country_id' => 4,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 1,
            'stream_title' => 'Fortnite',
            'stream_description' => 'Hoy jugamos con los viewers',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 10000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2' =>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 3,
            'country_id' => 5,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 2,
            'stream_title' => 'Just Chatting',
            'stream_description' => 'De Chill hablando del tiempo',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 60000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2' =>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 2,
            'country_id' => 6,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 3,
            'stream_title' => 'CS:GO',
            'stream_description' => 'Subimos a global hoy',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 35000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2' =>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 1,
            'country_id' => 1,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 4,
            'stream_title' => 'FIFA 21',
            'stream_description' => 'Abriendo sobres',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 20000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2' =>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 4,
            'country_id' => 2,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 5,
            'stream_title' => 'Valorant',
            'stream_description' => 'Hoy jugamos con los viewers',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 10000,
            'stream_check_picture_1' =>'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2' =>'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 3,
            'country_id' => 3,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 1,
            'stream_title' => 'Fortnite',
            'stream_description' => 'Hoy jugamos con los viewers',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 10000,
            'stream_check_picture_1' => 'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2' => 'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 2,
            'country_id' => 4,
            'stream_total_to_receive' => '1000',
        ]); 

        DB::table('streams')->insert([
            'streamer_id' => 2,
            'stream_title' => 'Just Chatting',
            'stream_description' => 'De Chill hablando del tiempo',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 60000,
            'stream_check_picture_1' => 'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2' => 'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 1,
            'country_id' => 5,
            'stream_total_to_receive' => '1000',
        ]);

        DB::table('streams')->insert([
            'streamer_id' => 3,
            'stream_title' => 'CS:GO',
            'stream_description' => 'Subimos a global hoy',
            'stream_date' => '2021-01-01',
            'stream_ammount_of_viewers' => 35000,
            'stream_check_picture_1' => 'https://assets.help.twitch.tv/article/img/2877822-10.png',
            'stream_check_picture_2' => 'https://assets.help.twitch.tv/article/img/000002339-08.png',
            'campaign_id' => 4,
            'country_id' => 6,
            'stream_total_to_receive' => '1000',
        ]);


    }
}

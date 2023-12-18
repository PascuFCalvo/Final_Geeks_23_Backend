<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'user_name' => 'admin',
            'user_email' => 'admin@admin.com',
            'password' => '$2y$12$zN6mDFwQvmuj/QYr.BYfY.p7r9k/IkMW.9HfPLT6nkugfBV4o0DIa', // password1234
            'user_phone' => '612345678',
            'user_role' => 'admin',
            'is_active' => true,
            'user_avatar_link' => 'https://res.cloudinary.com/dlcgfuujm/image/upload/v1702640064/s2h9oymyisx8uzexqst8.jpg',
        ]);

        DB::table('users')->insert([
            'user_name' => 'Pepe Perez',
            'user_email' => 'pepe@pepe.com',
            'password' => '$2y$12$zN6mDFwQvmuj/QYr.BYfY.p7r9k/IkMW.9HfPLT6nkugfBV4o0DIa',
            'user_phone' => '612345678',
            'user_role' => 'streamer',
            'is_active' => true,
            'user_avatar_link' => 'https://res.cloudinary.com/dlcgfuujm/image/upload/v1702545741/lplax0za0fzourntuiug.jpg',
        ]);

        DB::table('users')->insert([
            'user_name' => 'Juan Lopez',
            'user_email' => 'juan@juan.com',
            'password' => '$2y$12$zN6mDFwQvmuj/QYr.BYfY.p7r9k/IkMW.9HfPLT6nkugfBV4o0DIa',
            'user_phone' => '612345678',
            'user_role' => 'streamer',
            'is_active' => true,
            'user_avatar_link' => 'https://res.cloudinary.com/dlcgfuujm/image/upload/v1702545701/tgeex2ssylvyejzk5tih.jpg',
        ]);

        DB::table('users')->insert([
            'user_name' => 'Maria Garcia',
            'user_email' => 'maria@maria.com',
            'password' => '$2y$12$zN6mDFwQvmuj/QYr.BYfY.p7r9k/IkMW.9HfPLT6nkugfBV4o0DIa',
            'user_phone' => '612345678',
            'user_role' => 'streamer',
            'is_active' => true,
            'user_avatar_link' => 'https://res.cloudinary.com/dlcgfuujm/image/upload/v1702309691/lffmfw97cqzj44tup2ly.png',
        ]);

        DB::table('users')->insert([
            'user_name' => 'Paco Perez',
            'user_email' => 'paco@paco.com',
            'password' => '$2y$12$zN6mDFwQvmuj/QYr.BYfY.p7r9k/IkMW.9HfPLT6nkugfBV4o0DIa',
            'user_phone' => '612345678',
            'user_role' => 'streamer',
            'is_active' => true,
            'user_avatar_link' => 'https://res.cloudinary.com/dlcgfuujm/image/upload/v1702208182/eledn10vdfzvnlds1udu.jpg',
        ]);

        DB::table('users')->insert([
            'user_name' => 'Andrea Lopez',
            'user_email' => 'andrea@andrea.com',
            'password' => '$2y$12$zN6mDFwQvmuj/QYr.BYfY.p7r9k/IkMW.9HfPLT6nkugfBV4o0DIa',
            'user_phone' => '612345678',
            'user_role' => 'streamer',
            'is_active' => true,
            'user_avatar_link' => 'https://res.cloudinary.com/dlcgfuujm/image/upload/v1702141881/samples/upscale-face-1.jpg',
        ]);

        DB::table('users')->insert([
            'user_name' => 'Pablo Perez',
            'user_email' => 'pablo@pablo.com',
            'password' => '$2y$12$zN6mDFwQvmuj/QYr.BYfY.p7r9k/IkMW.9HfPLT6nkugfBV4o0DIa',
            'user_phone' => '612345678',
            'user_role' => 'brand',
            'is_active' => true,
            'user_avatar_link' => 'https://res.cloudinary.com/dlcgfuujm/image/upload/v1702141877/samples/man-on-a-street.jpg',
        ]);

        DB::table('users')->insert([
            'user_name' => 'Anton Lopez',
            'user_email' => 'anton@anton.com',
            'password' => '$2y$12$zN6mDFwQvmuj/QYr.BYfY.p7r9k/IkMW.9HfPLT6nkugfBV4o0DIa',
            'user_phone' => '612345678',
            'user_role' => 'brand',
            'is_active' => true,
            'user_avatar_link' => 'https://res.cloudinary.com/dlcgfuujm/image/upload/v1702141877/samples/man-on-a-escalator.jpg',
        ]);
    }
}

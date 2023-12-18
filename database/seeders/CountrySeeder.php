<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('countries')->insert([
            'country_name' => 'USA',
            'country_bonus' => 1.25,
        ]);
        DB::table('countries')->insert([
            'country_name' => 'UK',
            'country_bonus' => 1.10,
        ]);
        DB::table('countries')->insert([
            'country_name' => 'España',
            'country_bonus' => 1.00,
        ]);
        DB::table('countries')->insert([
            'country_name' => 'Mexico',
            'country_bonus' => 0.90,
        ]);
        DB::table('countries')->insert([
            'country_name' => 'Argentina',
            'country_bonus' => 0.80,
        ]);
        DB::table('countries')->insert([
            'country_name' => 'Colombia',
            'country_bonus' => 0.70,
        ]);
    }
}

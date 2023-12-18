<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            'user_id' => 7,
            'country_id' => 1,
            'brand_CIF' => 'x12345678A',
            'brand_name' => 'Nike',
            'brand_description' => 'Nike, Inc. is an American multinational corporation that is engaged in the design.',
            'brand_logo_link' => 'https://www.brandemia.org/wp-content/uploads/2011/09/logo_nike_principal.jpg',
            'has_active_campaigns' => false,

            
        ]);

        DB::table('brands')->insert([
            'user_id' => 8,
            'country_id' => 2,
            'brand_CIF' => 'x12345678B',
            'brand_name' => 'coca-cola',
            'brand_description' => 'Coca-Cola, or Coke, is a carbonated soft drink manufactured by The Coca-Cola Company.',
            'brand_logo_link' => 'https://ams3.digitaloceanspaces.com/graffica/2023/02/cocacola-logo.jpeg',
            'has_active_campaigns' => false,
        ]);
    }
}

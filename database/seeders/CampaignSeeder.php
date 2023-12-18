<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('campaigns')->insert([
            'brand_id' => 1,
            'campaign_name' => 'Nike Air Max',
            'campaign_description' => 'Nike Air Max is a line of shoes produced by Nike, Inc., with the first model released in 1987.',
            'campaign_start_date' => '2021-01-01',
            'price_per_single_view' => 0.1,
            
            'is_active' => true,
        ]);

        DB::table('campaigns')->insert([
            'brand_id' => 2,
            'campaign_name' => 'Coca-Cola',
            'campaign_description' => 'Coca-Cola, or Coke, is a carbonated soft drink manufactured by The Coca-Cola Company.',
            'campaign_start_date' => '2021-01-01',
            'price_per_single_view' => 0.3,
            
            'is_active' => true,
        ]);

        DB::table('campaigns')->insert([
            'brand_id' => 1,
            'campaign_name' => 'Nike Air Max 2',
            'campaign_description' => 'Nike Air Max is a line of shoes produced by Nike, Inc., with the first model released in 1987.',
            'campaign_start_date' => '2021-01-01',
            'price_per_single_view' => 0.4,
            
            'is_active' => true,
        ]);

        DB::table('campaigns')->insert([
            'brand_id' => 2,
            'campaign_name' => 'Coca-Cola 2',
            'campaign_description' => 'Coca-Cola, or Coke, is a carbonated soft drink manufactured by The Coca-Cola Company.',
            'campaign_start_date' => '2021-01-01',
            'price_per_single_view' => 0.5,
            
            'is_active' => true,
        ]);

        DB::table('campaigns')->insert([
            'brand_id' => 1,
            'campaign_name' => 'Nike Air Max 3',
            'campaign_description' => 'Nike Air Max is a line of shoes produced by Nike, Inc., with the first model released in 1987.',
            'campaign_start_date' => '2021-01-01',
            'price_per_single_view' => 0.6,
            
            'is_active' => true,
        ]);

        DB::table('campaigns')->insert([
            'brand_id' => 2,
            'campaign_name' => 'Coca-Cola 3',
            'campaign_description' => 'Coca-Cola, or Coke, is a carbonated soft drink manufactured by The Coca-Cola Company.',
            'campaign_start_date' => '2021-01-01',
            'price_per_single_view' => 0.2,
            
            'is_active' => true,
        ]);

        DB::table('campaigns')->insert([
            'brand_id' => 1,
            'campaign_name' => 'Nike Air Max 4',
            'campaign_description' => 'Nike Air Max is a line of shoes produced by Nike, Inc., with the first model released in 1987.',
            'campaign_start_date' => '2021-01-01',
            'price_per_single_view' => 0.4,
            
            'is_active' => true,
        ]);
    }
}

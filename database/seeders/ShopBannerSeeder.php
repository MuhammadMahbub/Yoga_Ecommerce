<?php

namespace Database\Seeders;

use App\Models\ShopBanner;
use Illuminate\Database\Seeder;

class ShopBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShopBanner::create([
            'banner_title' => ['en' => 'ONLINE SHOP', 'fr' => 'BOUTIQUE EN LIGNE'],
            'banner_image' => 'single_product_banner.jpg'
        ]);
    }
}

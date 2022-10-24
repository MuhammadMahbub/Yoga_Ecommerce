<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Banner::create([
            'banner_image' => 'banner1.jpg',
            'banner_title1' => ['fr' => 'FAITES VOTRE PRATIQUE ET', 'en' => 'MAKE YOUR PRACTICE AND'],
            'banner_title2' => ['fr' => 'TOUT ARRIVE', 'en' => 'EVERYTHING ARRIVES'],
            'button_text' => ['fr' => 'EN SAVOIR PLUS', 'en' => 'LEARN MORE'],
            'button_url' => '#',
        ]);

        Banner::create([
            'banner_image' => 'banner2.jpg',
            'banner_title1' => ['fr' => 'LE YOGA AU-DELÀ', 'en' => 'YOGA BEYOND'],
            'banner_title2' => ['fr' => 'La formation MAT', 'en' => 'MAT training'],
            'button_text' => ['fr' => 'EN SAVOIR PLUS', 'en' => 'LEARN MORE'],
            'button_url' => '#',
        ]);
    }
}

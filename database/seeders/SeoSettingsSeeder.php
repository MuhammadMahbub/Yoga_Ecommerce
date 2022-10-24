<?php

namespace Database\Seeders;

use App\Models\SeoSetting;
use Illuminate\Database\Seeder;

class SeoSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SeoSetting::create([
            'page_name' => 'home',
            'meta_title' => '#',
            'meta_description' => '#',
            'meta_keywords' => '#',
            'fb_url' => '#',
            'fb_title' => '#',
            'fb_description' => '#',
            'twitter_url' => '#',
            'twitter_title' => '#',
            'twitter_desciption' => '#',
        ]);
        SeoSetting::create([
            'page_name' => 'about',
            'meta_title' => '#',
            'meta_description' => '#',
            'meta_keywords' => '#',
            'fb_url' => '#',
            'fb_title' => '#',
            'fb_description' => '#',
            'twitter_url' => '#',
            'twitter_title' => '#',
            'twitter_desciption' => '#',
        ]);
        SeoSetting::create([
            'page_name' => 'contact',
            'meta_title' => '#',
            'meta_description' => '#',
            'meta_keywords' => '#',
            'fb_url' => '#',
            'fb_title' => '#',
            'fb_description' => '#',
            'twitter_url' => '#',
            'twitter_title' => '#',
            'twitter_desciption' => '#',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Socialurl;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SocialUrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Socialurl::create([
            'fb_url' => '#', 
            'youtube_url' => '#',
            'instagram_url' => '#',
            'twitter_url' => '#',
            'linkedin_url' => '#',
            'created_at' => Carbon::now(),
        ]);
    }
}

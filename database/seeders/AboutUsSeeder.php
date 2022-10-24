<?php

namespace Database\Seeders;

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUs::create([
            'banner_image'       => 'about_banner.jpg',
            'banner_title'       => ['fr' => 'À PROPOS DE NOTRE STUDIO', 'en' => 'ABOUT OUR STUDIO'],
            'title'       =>  ['fr' => 'Notre histoire', 'en' => 'Our story'],
            'slug'        => 'our-story',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit. Except sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim.',
            'image'       => 'story.jpg',
        ]);
    }
}

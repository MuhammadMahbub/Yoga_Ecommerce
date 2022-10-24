<?php

namespace Database\Seeders;

use App\Models\GalleryBannerSettings;
use Illuminate\Database\Seeder;

class GalleryBannerSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner = new GalleryBannerSettings();
        $banner->title ="GALLERY";
        $banner->image = 'uploads/gallery_banner_image/default.jpg';
        $banner->save();
    }
}

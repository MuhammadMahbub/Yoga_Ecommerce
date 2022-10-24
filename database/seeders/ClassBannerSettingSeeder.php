<?php

namespace Database\Seeders;

use App\Models\ClassBannerSetting;
use Illuminate\Database\Seeder;

class ClassBannerSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner = new ClassBannerSetting();
        $banner->title = 'FOLLOW OUR CLASS';
        $banner->image = 'uploads/class_page_banner/default.jpg';
        $banner->save();
        
    }
}

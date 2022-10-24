<?php

namespace Database\Seeders;

use App\Models\ServiceClassBannerSetting;
use Illuminate\Database\Seeder;

class ServiceClassBannerSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banner = new ServiceClassBannerSetting();
        $banner->title = 'FOLLOW OUR CLASS';
        $banner->image = 'uploads/class_page_banner/default.jpg';
        $banner->save();
    }
}

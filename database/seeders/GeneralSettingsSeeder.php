<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Seeder;

class GeneralSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralSetting::create([
            'email'              => 'admin@admin.com',
            'phone'              => '+966123456789',
            'address'            => 'Al-Ahsa, Saudi Arabia',
            'logo'               => 'logo_live.png',
            'logo_dark'          => 'logo_live.png',
            'favicon'            => 'favicon.ico',
            'copyright'          => 'Copyright © 2015. Asana All rights reserved',
        ]);
    }
}

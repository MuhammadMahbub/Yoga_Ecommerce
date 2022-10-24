<?php

namespace Database\Seeders;

use App\Models\ColorSetting;
use Illuminate\Database\Seeder;

class ColorSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colorSettings = ColorSetting::first();

        if($colorSettings != null){
            $colorSettings->delete();
        }
        
        ColorSetting::create([
            'button_color'          => '#5fc7ae',
            'button_hover_color'    => '#96e9d5',
            'menu_text_color'       => '#ffffff',
            'body_title_color'      => '#333333',
            'body_text_color'       => '#7f7f7f',
            'bg_color'              => '#ffffff',
            'secondary_bg_color'    => '#f4f4f4',
        ]);
    }
}

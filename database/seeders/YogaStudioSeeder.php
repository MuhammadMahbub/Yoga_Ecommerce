<?php

namespace Database\Seeders;

use App\Models\YogaStudio;
use Illuminate\Database\Seeder;

class YogaStudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        YogaStudio::create([
            'image' => 'studio1.jpg',
        ]);
        YogaStudio::create([
            'image' => 'studio2.jpg',
        ]);
        YogaStudio::create([
            'image' => 'studio3.jpg',
        ]);
        YogaStudio::create([
            'image' => 'studio4.jpg',
        ]);
        YogaStudio::create([
            'image' => 'studio5.jpg',
        ]);
       
    }
}

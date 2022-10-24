<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Testimonial::create([
            'name' => 'Nathan Ali',
            'designation' => ['en' => 'Director General', 'fr' => 'Directeur général'],
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, eaque quis nulla veniam cumque ducimus voluptatum cum libero et, eveniet odio quam magni officiis Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui expedita voluptatum rerum quam cum saepe ex a accusantium molestiae eius veritatis, neque laboriosam eaque, fuga eos quos eum animi nihil.'
        ]);
        Testimonial::create([
            'name' => 'Lucas Lie',
            'designation' => ['en' => 'CEO', 'fr' => 'PDG'],
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, eaque quis nulla veniam cumque ducimus voluptatum cum libero et, eveniet odio quam magni officiis'
        ]);
        Testimonial::create([
            'name' => 'Louis PK',
            'designation' => ['en' => 'Assistant principal', 'fr' => 'Directeur adjoint'],
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, eaque quis nulla veniam cumque ducimus voluptatum cum libero et,'
        ]);
        Testimonial::create([
            'name' => 'Hugo Day',
            'designation' => ['en' => 'Director General', 'fr' => 'Directeur général'],
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, eaque quis nulla veniam cumque ducimus voluptatum cum libero et, eveniet odio quam magni officiis'
        ]);
        Testimonial::create([
            'name' => 'Ethan khan',
            'designation' => ['en' => 'Chief Executive', 'fr' => 'Chef de lexécutif'],
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, eaque quis nulla veniam cumque ducimus voluptatum cum libero et, eveniet odio quam magni officiis'
        ]);
        Testimonial::create([
            'name' => 'Jules Mia',
            'designation' => ['en' => 'Implementation office', 'fr' => "Bureau d'exécution"],
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, eaque quis nulla veniam cumque Error, eaque quis nulla veniam cumque d  ducimus voluptatum cum libero et, eveniet odio quam magni officiis'
        ]);
    }
}

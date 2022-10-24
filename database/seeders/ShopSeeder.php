<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::create([
            'category_id' => '1',
            'name' => 'Tapis de yoga Citron Sundial',
            'slug' => 'citron-sundial-yoga-mat1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed do eiusmod tempor incididunt. Sed do eiusmod tempor incididunt.',
            'image' => 'shop1.jpg',
            'thick' => '5',
            'price' => '28',
        ]);
        Shop::create([
            'category_id' => '1',
            'name' => 'Gaiam Sol Premium-Grip Yoga Mat',
            'slug' => 'citron-sundial-yoga-mat2',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed do eiusmod tempor incididunt. Sed do eiusmod tempor incididunt.',
            'image' => 'shop2.jpg',
            'thick' => '5',
            'price' => '28',
        ]);
        Shop::create([
            'category_id' => '1',
            'name' => 'Tapis de yoga Citron Sundial',
            'slug' => 'gaiam-sol-premium-gripm-yoga-mat3',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed do eiusmod tempor incididunt. Sed do eiusmod tempor incididunt.',
            'image' => 'shop3.jpg',
            'thick' => '5',
            'price' => '28',
        ]);
        Shop::create([
            'category_id' => '1',
            'name' => 'Gaiam Sol Premium-Grip Yoga Mat',
            'slug' => 'gaiam-sol-premium-gripm-yoga-mat4',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed do eiusmod tempor incididunt. Sed do eiusmod tempor incididunt.',
            'image' => 'shop4.jpg',
            'thick' => '5',
            'price' => '28',
        ]);
        Shop::create([
            'category_id' => '2',
            'name' => 'Tapis de yoga Citron Sundial',
            'slug' => 'citron-sundial-yoga-mat5',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed do eiusmod tempor incididunt. Sed do eiusmod tempor incididunt.',
            'image' => 'shop1.jpg',
            'thick' => '5',
            'price' => '28',
        ]);
        Shop::create([
            'category_id' => '2',
            'name' => 'Gaiam Sol Premium-Grip Yoga Mat',
            'slug' => 'gaiam-sol-premium-gripm-yoga-mat6',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed do eiusmod tempor incididunt. Sed do eiusmod tempor incididunt.',
            'image' => 'shop2.jpg',
            'thick' => '5',
            'price' => '28',
        ]);
        Shop::create([
            'category_id' => '2',
            'name' => 'Tapis de yoga Citron Sundial',
            'slug' => 'citron-sundial-yoga-mat7',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed do eiusmod tempor incididunt. Sed do eiusmod tempor incididunt.',
            'image' => 'shop3.jpg',
            'thick' => '5',
            'price' => '28',
        ]);
        Shop::create([
            'category_id' => '2',
            'name' => 'Gaiam Sol Premium-Grip Yoga Mat',
            'slug' => 'citron-sundial-yoga-mat8',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Sed do eiusmod tempor incididunt. Sed do eiusmod tempor incididunt.',
            'image' => 'shop4.jpg',
            'thick' => '5',
            'price' => '28',
        ]);
    }
}

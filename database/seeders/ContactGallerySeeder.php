<?php

namespace Database\Seeders;

use App\Models\ContactGallery;
use Illuminate\Database\Seeder;

class ContactGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactGallery::create([
            'image' => 'contact1.jpg',
        ]);
        ContactGallery::create([
            'image' => 'contact2.jpg',
        ]);
    }
}

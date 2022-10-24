<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'banner_image'      => 'banner.jpg',
            'banner_title'      => ['fr' => 'VOUS ÊTES LES BIENVENUS', 'en' => 'YOU ARE WELCOME'],
            'title'             => ['fr' => 'Contact', 'en' => 'Contact'],
            'phone'             => '023 8301 4721',
            'email'             => 'hello@highseastudio.com',
            'address'           => '350 5th Ave, New York, NY 10118, United States',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::factory()->count(50)->create();
        $categories = ['VÊTEMENTS', 'MATS', 'SERVIETTES DE BAIN', 'BOTTES', 'ACCESSOIRES', 'AUTRE',];
        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }
    }
}

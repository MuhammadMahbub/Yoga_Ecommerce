<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            ColorSettingsSeeder::class,
            SocialUrlSeeder::class,
            GeneralSettingsSeeder::class,
            SubscriberSeeder::class,
            ContactSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            RoleSeeder::class,
            UserPermissionSeeder::class,
            RolePermissionSeeder::class,
            BannerSeeder::class,
            ShopSeeder::class,
            ShopThumbSeeder::class,
            TeamSeeder::class,
            AboutUsSeeder::class,
            YogaStudioSeeder::class,
            ShopBannerSeeder::class,
            BlogSeeder::class,
            SeoSettingsSeeder::class,
            ClassSeeder::class,
            TestimonialSeeder::class,
            StripeSettingSeeder::class,
            ClassBannerSettingSeeder::class,
            GalleryBannerSettingsSeeder::class, 
            MailSeeder::class, 
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\StripeSetting;
use Illuminate\Database\Seeder;

class StripeSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StripeSetting::create();
    }
}

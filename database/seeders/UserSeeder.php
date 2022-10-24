<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ThemeSetting;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user =  User::create([
            'name' => 'Admin', 
            'email' => 'admin@admin.com', 
            'password' => bcrypt('@@Bladepro@123@@'), 
            'role'    => '1',
            'email_verified_at' => Carbon::now(),
        ]);
        
        ThemeSetting::create([
            'user_id' => $user->id, 
            'created_at' => Carbon::now(), 
        ]); 
    }
}

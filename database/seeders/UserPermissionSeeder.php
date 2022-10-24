<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Database\Seeder;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'admin@admin.com')->first();

          // Category 
          UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'category', 
            'action' => 'read',
        ]);
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'category', 
            'action' => 'create',
        ]);
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'category', 
            'action' => 'edit',
        ]);
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'category', 
            'action' => 'delete',
        ]);
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'category', 
            'action' => 'import',
        ]);
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'category', 
            'action' => 'export',
        ]);

        // Sub Category
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'sub_category', 
            'action' => 'read',
        ]);
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'sub_category', 
            'action' => 'create',
        ]);
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'sub_category', 
            'action' => 'edit',
        ]);
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'sub_category', 
            'action' => 'delete',
        ]);
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'sub_category', 
            'action' => 'import',
        ]);
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'sub_category', 
            'action' => 'export',
        ]);

        // Products 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'products', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'products', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'products', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'products', 
            'action' => 'delete',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'products', 
            'action' => 'import',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'products', 
            'action' => 'export',
        ]);

        // Testimonial 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'testimonial', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'testimonial', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'testimonial', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'testimonial', 
            'action' => 'delete',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'testimonial', 
            'action' => 'import',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'testimonial', 
            'action' => 'export',
        ]); 

        // client 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'client', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'client', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'client', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'client', 
            'action' => 'delete',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'client', 
            'action' => 'import',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'client', 
            'action' => 'export',
        ]);

        // User

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'user', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'user', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'user', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'user', 
            'action' => 'delete',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'user', 
            'action' => 'import',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'user', 
            'action' => 'export',
        ]);

        // user

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'user', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'user', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'user', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'user', 
            'action' => 'delete',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'user', 
            'action' => 'import',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'user', 
            'action' => 'export',
        ]);

        // contact 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'contact', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'contact', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'contact', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'contact', 
            'action' => 'delete',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'contact', 
            'action' => 'import',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'contact', 
            'action' => 'export',
        ]);

        // subscriber 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'subscriber', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'subscriber', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'subscriber', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'subscriber', 
            'action' => 'delete',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'subscriber', 
            'action' => 'import',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'subscriber', 
            'action' => 'export',
        ]);

        // Appointment

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'appointment', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'appointment', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'appointment', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'appointment', 
            'action' => 'delete',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'appointment', 
            'action' => 'import',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'appointment', 
            'action' => 'export',
        ]);

        // general_setting 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'general_setting', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'general_setting', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'general_setting', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'general_setting', 
            'action' => 'delete',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'general_setting', 
            'action' => 'import',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'general_setting', 
            'action' => 'export',
        ]);

        // color_setting 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'color_setting', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'color_setting', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'color_setting', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'color_setting', 
            'action' => 'delete',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'color_setting', 
            'action' => 'import',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'color_setting', 
            'action' => 'export',
        ]);

        // social_url 

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'social_url', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'social_url', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'social_url', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'social_url', 
            'action' => 'delete',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'social_url', 
            'action' => 'import',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'social_url', 
            'action' => 'export',
        ]);

        // Yoga Class 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'class', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'class', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'class', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'class', 
            'action' => 'delete',
        ]);  

        // Coupons 

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'coupons', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'coupons', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'coupons', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'coupons', 
            'action' => 'delete',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'coupons', 
            'action' => 'import',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'coupons', 
            'action' => 'export',
        ]);

        // Coupons 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'coupons', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'coupons', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'coupons', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'coupons', 
            'action' => 'delete',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'coupons', 
            'action' => 'import',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'coupons', 
            'action' => 'export',
        ]);

        // Banner 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'banner', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'banner', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'banner', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'banner', 
            'action' => 'delete',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'banner', 
            'action' => 'import',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'banner', 
            'action' => 'export',
        ]);

        // Studio 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'studio', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'studio', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'studio', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'studio', 
            'action' => 'delete',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'studio', 
            'action' => 'import',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'studio', 
            'action' => 'export',
        ]);

        // About us 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'about', 
            'action' => 'read',
        ]);
 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'about', 
            'action' => 'edit',
        ]);
 
        // team 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'team', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'team', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'team', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'team', 
            'action' => 'delete',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'team', 
            'action' => 'import',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'team', 
            'action' => 'export',
        ]);
 
        // Yoga Shop 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'shop', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'shop', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'shop', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'shop', 
            'action' => 'delete',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'shop', 
            'action' => 'import',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'shop', 
            'action' => 'export',
        ]);
 
        // Role 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'role', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'role', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'role', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'role', 
            'action' => 'delete',
        ]);
 
        // Blogs 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'blogs', 
            'action' => 'read',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'blogs', 
            'action' => 'create',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'blogs', 
            'action' => 'edit',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'blogs', 
            'action' => 'delete',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'blogs', 
            'action' => 'import',
        ]);

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'blogs', 
            'action' => 'export',
        ]);
 
        // Message 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'message', 
            'action' => 'read',
        ]); 
       
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'message', 
            'action' => 'delete',
        ]);
 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'message', 
            'action' => 'export',
        ]);
 
        // Studio 
        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'seo', 
            'action' => 'read',
        ]); 

        UserPermission::create([
            'user_id' => $user->id, 
            'model'   => 'seo', 
            'action' => 'edit',
        ]); 
    }
}

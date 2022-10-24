<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::first(); 


        // Category 
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'category', 
            'action' => 'read',
        ]);
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'category', 
            'action' => 'create',
        ]);
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'category', 
            'action' => 'edit',
        ]);
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'category', 
            'action' => 'delete',
        ]);
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'category', 
            'action' => 'import',
        ]);
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'category', 
            'action' => 'export',
        ]);

        // Sub Category
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'sub_category', 
            'action' => 'read',
        ]);
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'sub_category', 
            'action' => 'create',
        ]);
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'sub_category', 
            'action' => 'edit',
        ]);
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'sub_category', 
            'action' => 'delete',
        ]);
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'sub_category', 
            'action' => 'import',
        ]);
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'sub_category', 
            'action' => 'export',
        ]);

        // Products 
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'products', 
            'action' => 'read',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'products', 
            'action' => 'create',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'products', 
            'action' => 'edit',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'products', 
            'action' => 'delete',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'products', 
            'action' => 'import',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'products', 
            'action' => 'export',
        ]);

        // Testimonial 
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'testimonial', 
            'action' => 'read',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'testimonial', 
            'action' => 'create',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'testimonial', 
            'action' => 'edit',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'testimonial', 
            'action' => 'delete',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'testimonial', 
            'action' => 'import',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'testimonial', 
            'action' => 'export',
        ]); 

        // client 
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'client', 
            'action' => 'read',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'client', 
            'action' => 'create',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'client', 
            'action' => 'edit',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'client', 
            'action' => 'delete',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'client', 
            'action' => 'import',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'client', 
            'action' => 'export',
        ]);

        // User

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'user', 
            'action' => 'read',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'user', 
            'action' => 'create',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'user', 
            'action' => 'edit',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'user', 
            'action' => 'delete',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'user', 
            'action' => 'import',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'user', 
            'action' => 'export',
        ]);

        // Role

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'role', 
            'action' => 'read',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'role', 
            'action' => 'create',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'role', 
            'action' => 'edit',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'role', 
            'action' => 'delete',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'role', 
            'action' => 'import',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'role', 
            'action' => 'export',
        ]);

        // contact 
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'contact', 
            'action' => 'read',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'contact', 
            'action' => 'create',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'contact', 
            'action' => 'edit',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'contact', 
            'action' => 'delete',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'contact', 
            'action' => 'import',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'contact', 
            'action' => 'export',
        ]);

        // subscriber 
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'subscriber', 
            'action' => 'read',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'subscriber', 
            'action' => 'create',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'subscriber', 
            'action' => 'edit',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'subscriber', 
            'action' => 'delete',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'subscriber', 
            'action' => 'import',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'subscriber', 
            'action' => 'export',
        ]);

        // Appointment

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'appointment', 
            'action' => 'read',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'appointment', 
            'action' => 'create',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'appointment', 
            'action' => 'edit',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'appointment', 
            'action' => 'delete',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'appointment', 
            'action' => 'import',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'appointment', 
            'action' => 'export',
        ]);

        // general_setting 
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'general_setting', 
            'action' => 'read',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'general_setting', 
            'action' => 'create',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'general_setting', 
            'action' => 'edit',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'general_setting', 
            'action' => 'delete',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'general_setting', 
            'action' => 'import',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'general_setting', 
            'action' => 'export',
        ]);

        // color_setting 
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'color_setting', 
            'action' => 'read',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'color_setting', 
            'action' => 'create',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'color_setting', 
            'action' => 'edit',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'color_setting', 
            'action' => 'delete',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'color_setting', 
            'action' => 'import',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'color_setting', 
            'action' => 'export',
        ]);

        // social_url 

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'social_url', 
            'action' => 'read',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'social_url', 
            'action' => 'create',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'social_url', 
            'action' => 'edit',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'social_url', 
            'action' => 'delete',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'social_url', 
            'action' => 'import',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'social_url', 
            'action' => 'export',
        ]);

        // Blog 
        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'blog', 
            'action' => 'read',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'blog', 
            'action' => 'create',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'blog', 
            'action' => 'edit',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'blog', 
            'action' => 'delete',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'blog', 
            'action' => 'import',
        ]);

        RolePermission::create([
            'role_id' => $role->id, 
            'model'   => 'blog', 
            'action' => 'export',
        ]);

        // END



    }
}

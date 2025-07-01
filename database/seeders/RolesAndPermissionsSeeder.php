<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        // Course permissions
        Permission::create(['name' => 'view courses']);
        Permission::create(['name' => 'create courses']);
        Permission::create(['name' => 'edit courses']);
        Permission::create(['name' => 'delete courses']);
        
        // Lesson permissions
        Permission::create(['name' => 'view lessons']);
        Permission::create(['name' => 'create lessons']);
        Permission::create(['name' => 'edit lessons']);
        Permission::create(['name' => 'delete lessons']);
        
        // Assignment permissions
        Permission::create(['name' => 'view assignments']);
        Permission::create(['name' => 'create assignments']);
        Permission::create(['name' => 'edit assignments']);
        Permission::create(['name' => 'delete assignments']);
        Permission::create(['name' => 'grade assignments']);
        
        // Submission permissions
        Permission::create(['name' => 'view submissions']);
        Permission::create(['name' => 'create submissions']);
        Permission::create(['name' => 'edit submissions']);
        
        // Event permissions
        Permission::create(['name' => 'view events']);
        Permission::create(['name' => 'create events']);
        Permission::create(['name' => 'edit events']);
        Permission::create(['name' => 'delete events']);
        
        // Blog permissions
        Permission::create(['name' => 'view blog posts']);
        Permission::create(['name' => 'create blog posts']);
        Permission::create(['name' => 'edit blog posts']);
        Permission::create(['name' => 'delete blog posts']);
        
        // Contact permissions
        Permission::create(['name' => 'view contacts']);
        Permission::create(['name' => 'respond to contacts']);
        Permission::create(['name' => 'delete contacts']);
        
        // User permissions
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

        // Create roles and assign permissions
        
        // Admin role
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());
        
        // Teacher role
        $teacherRole = Role::create(['name' => 'teacher']);
        $teacherRole->givePermissionTo([
            'view courses',
            'create courses',
            'edit courses',
            'view lessons',
            'create lessons',
            'edit lessons',
            'delete lessons',
            'view assignments',
            'create assignments',
            'edit assignments',
            'delete assignments',
            'grade assignments',
            'view submissions',
            'view events',
            'create events',
            'edit events',
            'view blog posts',
            'create blog posts',
            'edit blog posts',
        ]);
        
        // Student role
        $studentRole = Role::create(['name' => 'student']);
        $studentRole->givePermissionTo([
            'view courses',
            'view lessons',
            'view assignments',
            'view submissions',
            'create submissions',
            'edit submissions',
            'view events',
            'view blog posts',
        ]);
        
        // Parent role
        $parentRole = Role::create(['name' => 'parent']);
        $parentRole->givePermissionTo([
            'view courses',
            'view assignments',
            'view events',
            'view blog posts',
        ]);
    }
}

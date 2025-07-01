<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);
        
        // Create admin user
        \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@die.edu',
            'password' => bcrypt('password'),
        ])->assignRole('admin');
        
        // Create teacher user
        \App\Models\User::factory()->create([
            'name' => 'Teacher User',
            'email' => 'teacher@die.edu',
            'password' => bcrypt('password'),
        ])->assignRole('teacher');
        
        // Create student user
        \App\Models\User::factory()->create([
            'name' => 'Student User',
            'email' => 'student@die.edu',
            'password' => bcrypt('password'),
        ])->assignRole('student');
        
        // Create parent user
        \App\Models\User::factory()->create([
            'name' => 'Parent User',
            'email' => 'parent@die.edu',
            'password' => bcrypt('password'),
        ])->assignRole('parent');
    }
}

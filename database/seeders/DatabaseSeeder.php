<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; 
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $user1 = User::factory()->create([
            'name' => 'Admin',
            'email' => 'sss@gmail.com',
        ]);
        $user2 = User::factory()->create([
            'name' => 'Editor',
            'email' => 'test@gmail.com',
        ]);
        $role = Role::create(['name' => 'Admin']);
        $user1->assignRole($role);
        
        $role = Role::create(['name' => 'Editor']);
        $user2->assignRole($role);
    }
}

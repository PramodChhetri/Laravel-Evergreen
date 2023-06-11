<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'access-account',
            'created_at' => now(),  
        ]);
        Permission::create([
            'name' => 'access-dashboard',
            'created_at' => now(),  
        ]);
        Permission::create([
            'name' => 'manage-users',
            'created_at' => now(),  
        ]);
        Permission::create([
            'name' => 'manage-categories',
            'created_at' => now(),  
        ]);
        Permission::create([
            'name' => 'manage-products',
            'created_at' => now(),  
        ]);
        Permission::create([
            'name' => 'manage-feedbacks',
            'created_at' => now(),  
        ]);
        Permission::create([
            'name' => 'buy-products',
            'created_at' => now(),  
        ]);
        Permission::create([
            'name' => 'sell-products',
            'created_at' => now(),  
        ]);      
    }
}

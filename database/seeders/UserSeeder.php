<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Seller
        DB::table('users')->insert([
            'name' => Str::random(5),
            'email' => Str::random(5).'@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 2,
        ]);
        
        // Buyer
        DB::table('users')->insert([
            'name' => Str::random(5),
            'email' => Str::random(5).'@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'created_at' => now(),
            'updated_at' => now(),
            'role_id' => 3,
        ]);
    }
}
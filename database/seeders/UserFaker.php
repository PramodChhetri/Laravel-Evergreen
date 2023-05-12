<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\User;

class UserFaker extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Seller
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->email.'@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 2,
            'created_at' => now(),
            'updated_at' => now() 
        ]);
        
        // Buyer
        for($i =1; $i<5; $i++){
        DB::table('users')->insert([
            'name' => $faker->name,
            'email' => $faker->email.'@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'role_id' => 3,
            'created_at' => now(),
            'updated_at' => now() 
        ]);
    }
    }
}

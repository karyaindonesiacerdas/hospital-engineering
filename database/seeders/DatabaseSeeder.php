<?php

namespace Database\Seeders;

use App\Models\Package;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'role' => 'admin',
            'password' => bcrypt('secret123'),
        ]);

        Package::insert([
            ['name' => 'mercury', 'order' => 1, 'created_at' => now('Asia/Jakarta'), 'updated_at' => now('Asia/Jakarta')],
            ['name' => 'mars', 'order' => 2, 'created_at' => now('Asia/Jakarta'), 'updated_at' => now('Asia/Jakarta')],
            ['name' => 'venus', 'order' => 3, 'created_at' => now('Asia/Jakarta'), 'updated_at' => now('Asia/Jakarta')],
            ['name' => 'uranus', 'order' => 4, 'created_at' => now('Asia/Jakarta'), 'updated_at' => now('Asia/Jakarta')],
            ['name' => 'jupiter', 'order' => 5, 'created_at' => now('Asia/Jakarta'), 'updated_at' => now('Asia/Jakarta')],
        ]);
    }
}

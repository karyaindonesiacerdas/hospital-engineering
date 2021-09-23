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


        // User::insert([
        //     [
        //         'name' => 'exh1',
        //         'email' => 'exh1@mail.com',
        //         "mobile" => "68763482321",
        //         "job_function" => "Engineer",
        //         "password" => bcrypt("secret123"),
        //         "company_name" => "company_name",
        //         "company_website" => "company_website",
        //         "country" => "Indonesia",
        //         "province" => "Aceh",
        //         "business_nature" => ["Hospital Mechanic", "Hospital Building"],
        //         "role" => "exhibitor",
        //         "package_id" => 1,
        //         'created_at' => now('Asia/Jakarta'), 'updated_at' => now('Asia/Jakarta')
        //     ],
        //     [
        //         'name' => 'exh2',
        //         'email' => 'exh2@mail.com',
        //         "mobile" => "68763482321",
        //         "job_function" => "Engineer",
        //         "password" => bcrypt("secret123"),
        //         "company_name" => "company_name",
        //         "company_website" => "company_website",
        //         "country" => "Indonesia",
        //         "province" => "Aceh",
        //         "business_nature" => ["Hospital Mechanic", "Hospital Building"],
        //         "role" => "exhibitor",
        //         "package_id" => 2,
        //         'created_at' => now('Asia/Jakarta'), 'updated_at' => now('Asia/Jakarta')
        //     ],
        //     [
        //         'name' => 'exh3',
        //         'email' => 'exh3@mail.com',
        //         "mobile" => "68763482321",
        //         "job_function" => "Engineer",
        //         "password" => bcrypt("secret123"),
        //         "company_name" => "company_name",
        //         "company_website" => "company_website",
        //         "country" => "Indonesia",
        //         "province" => "Aceh",
        //         "business_nature" => ["Hospital Mechanic", "Hospital Building"],
        //         "role" => "exhibitor",
        //         "package_id" => 1,
        //         'created_at' => now('Asia/Jakarta'), 'updated_at' => now('Asia/Jakarta')
        //     ],
        // ]);
    }
}

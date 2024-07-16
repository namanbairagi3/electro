<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SystemInfo;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Abhishek',
            'surname' => 'Bairagi',
            'email' => 'admin1@gmail.com',
            'password' => 'admin1@gmail.com',
            'role' => 'admin',

        ]);

        // Create system info records using createMany
        SystemInfo::factory()->createMany([
            [
                'meta_name' => 'app_name',
                'meta_value' => 'Amazon',
            ],
            [
                'meta_name' => 'app_version',
                'meta_value' => '1.0.0',
            ],
            [
                'meta_name' => 'app_logo',
                'meta_value' => 'https://pngimg.com/uploads/amazon/amazon_PNG1.png',
            ],
        ]);
    }
}
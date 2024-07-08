<?php

namespace Database\Seeders;

use App\Models\User;
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
            'name' => 'Leonardo Slepack',
            'email' => 'sleopack@icloud.com',
            'password' => 'Betel123@'
        ]);

        User::factory()->create([
            'name' => 'portaria',
            'email' => 'portaria@beteldescartavel.com',
            'password' => 'Betel123@PorT'
        ]);
    }
}

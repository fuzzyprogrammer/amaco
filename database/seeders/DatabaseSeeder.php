<?php

namespace Database\Seeders;

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
        \App\Models\User::factory()->make([
            'email' => 'admin@email.com',
            'name' => 'admin',
            // 'email_verified_at' => now(),
            'password' => bcrypt("admin@123"),
        ]);
    }
}

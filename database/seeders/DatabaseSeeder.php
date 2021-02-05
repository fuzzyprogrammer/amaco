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
        \App\Models\User::create([
            'fname' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt("admin@123")
        ]);
    }
}

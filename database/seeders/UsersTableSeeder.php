<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::create([
            'name' => 'admin',
            'email' => 'super_admin@app.com',
            'password' => bcrypt('123123123'),
        ]);

        $user->attachRole('super_admin');
    }
}

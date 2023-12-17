<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create 5 users with the role 'author'
        User::factory(5)->create(['role' => 'author']);

        // Create 5 users with the role 'admin'
        User::factory(5)->create(['role' => 'admin']);
    }
}

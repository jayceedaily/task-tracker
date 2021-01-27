<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jaycee Mariano',
            'email' => 'jayceedaily@gmail.com',
            'email_verified_at' => now(),
            'password' => \bcrypt('d@$$W0rq'),
        ]);

        User::create([
            'name' => 'Nova Opinga',
            'email' => 'novaopinga@gmail.com',
            'email_verified_at' => now(),
            'password' => \bcrypt('d@$$W0rq'),
        ]);
    }
}

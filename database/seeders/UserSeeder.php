<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create(
            [
                'id' => 1,
                'name' => 'Muhammad Vallen Firdaus',
                'username' => 'mhmmdvlln',
                'email' => 'admin1@gmail.com',
                'password' => bcrypt('password'),
            ],
        );
    }
}

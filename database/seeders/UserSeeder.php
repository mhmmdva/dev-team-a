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
                'name' => 'Muhammad Vallen Firdaus',
                'username' => 'mhmmdvlln',
                'email' => 'admin1@gmail.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Faizah',
                'username' => 'faizah_faizah',
                'email' => 'admin2@gmail.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Ardianita',
                'username' => 'ardianita_nita',
                'email' => 'admin3@gmail.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'Azriel',
                'username' => 'azriel_99',
                'email' => 'admin4@gmail.com',
                'password' => bcrypt('password'),
            ]
        );
    }
}

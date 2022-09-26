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
                'id' => 6,
                'name' => 'Muhammad Vallen Firdaus',
                'username' => 'mhmmdvlln',
                'email' => 'admin1@gmail.com',
                'password' => bcrypt('password'),
            ]
        );

        User::create(
            [
                'id' => 7,
                'name' => 'Faizah',
                'username' => 'faizahfai',
                'email' => 'admin2@gmail.com',
                'password' => bcrypt('password'),
            ]
        );
        User::create(
            [
                'id' => 8,
                'name' => 'Ardianita',
                'username' => 'ardianitanita',
                'email' => 'admin3@gmail.com',
                'password' => bcrypt('password'),
            ]
        );

        User::create(
            [
                'id' => 9,
                'name' => 'Azriel Fahrulrezy',
                'username' => 'azrielrezy',
                'email' => 'admin4@gmail.com',
                'password' => bcrypt('password'),
            ]
        );
    }
}

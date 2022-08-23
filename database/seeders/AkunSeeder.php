<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'subhan',
                'email' => 'subhan@gmail.com',
                'password' => bcrypt('123'),
                'level' => 'admin'
            ],
            [
                'name' => 'andi',
                'email' => 'andi@gmail.com',
                'password' => bcrypt('123'),
                'level' => 'user',
            ]
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}

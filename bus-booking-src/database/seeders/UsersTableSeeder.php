<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'user' => [
                    'name' => 'User',
                    'email' => 'a@b.c',
                    'password' => '12345678'
                ],
                // 'roles' => ['admin']
            ],
        ];

        foreach($users as $key => $value)
            \App\Models\User::create($value['user']);
    }
}

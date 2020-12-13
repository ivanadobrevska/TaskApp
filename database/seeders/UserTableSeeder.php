<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \DB::table('users')->insert([
            [
                'username' => 'firstUser',
                'password' => bcrypt('firstUser')
            ],
            [
                'username' => 'secondUser',
                'password' => bcrypt('secondUser')
            ]
        ]);
    }
}

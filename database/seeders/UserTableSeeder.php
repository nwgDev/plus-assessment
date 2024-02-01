<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'firstname' => 'Winnie',
                'lastname' => 'Nkwinika',
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('winnie'),
                'status' => 'active',
            ],
            [
                'firstname' => 'Mcbright',
                'lastname' => 'Chiqinda',
                'name' => 'content manager',
                'email' => 'manager@manager.com',
                'password' => bcrypt('winnie'),
                'status' => 'active',
            ],

            [
                'firstname' => 'Xiluva',
                'lastname' => 'Ngobeni',
                'name' => 'user',
                'email' => 'user@user.com',
                'password' => bcrypt('winnie'),
                'status' => 'inactive',
            ],
        ]);
    }
}

<?php


namespace Database\Seeders;


use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin' => 'Admin',
            'user' => 'User',
            'content manager' => 'Content Manager',
        ];

        foreach ($roles as $key => $value) {
            Role::updateOrCreate(
                ['name' => $key],
                ['description' => $value]);

        }
    }
}

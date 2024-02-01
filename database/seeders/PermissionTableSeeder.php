<?php


namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'view-admin-dashboard' => 'View Admin Dashboard',
            'administer-user' => 'Administer Users',
        ];

        foreach ($permissions as $key => $value) {
            Permission::updateOrCreate(
                ['group' => $key],
                ['name' => $value]);
        }
    }
}

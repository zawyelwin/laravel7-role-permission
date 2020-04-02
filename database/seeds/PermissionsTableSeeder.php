<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $permissions = Permission::defaultPermissions();
        
        foreach ($permissions as $perms) {
            Permission::firstOrCreate(['name' => $perms]);
        }
    }
}

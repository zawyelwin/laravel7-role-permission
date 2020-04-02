<?php

namespace App\Console\Commands;

use App\Role;
use App\Permission;
use Illuminate\Support\Str;
use Illuminate\Console\Command;

class AuthPermissionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth:permission {name} {--R|remove}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to create permissions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $permissions = $this->generatePermissions();

        if( $is_remove = $this->option('remove') ) {    
            if( Permission::where('name', 'LIKE', '%'. $this->getNameArgument())->delete() ) {
                $this->warn('Permissions ' . implode(', ', $permissions) . ' deleted.');
            }  else {
                $this->warn('No permissions for ' . $this->getNameArgument() .' found!');
            }
        } else {

            foreach ($permissions as $permission) {
                Permission::firstOrCreate(['name' => $permission ]);
            }
            $this->info('Permissions ' . implode(', ', $permissions) . ' created.');
        }

        if( $role = Role::where('name', 'SuperAdmin')->first() ) {
            $role->syncPermissions(Permission::all());
            $this->info('SuperAdmin permissions');
        }

    }

    private function generatePermissions()
    {
        $abilities = ['view', 'add', 'edit', 'delete'];
        $name = $this->getNameArgument();

        return array_map(function($val) use ($name) {
            return $val . '_'. $name;
        }, $abilities);
    }


    private function getNameArgument()
    {
        return strtolower(Str::plural($this->argument('name')));
    }

}

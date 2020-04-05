<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Generators\CrudGeneratorService;

class CrudGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crud:generate {name : Class (Singular), e.g User, Place, Car}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create all CRUD operations with a single command';

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
        $name = $this->argument('name');

        CrudGeneratorService::MakeController($name);
        CrudGeneratorService::MakeModel($name);
        CrudGeneratorService::MakeMigration($name);
        CrudGeneratorService::MakeRequest($name);
        CrudGeneratorService::MakeRoute($name);
        // API
        // CrudGeneratorService::MakeApiRoute($name);
        // CrudGeneratorService::MakeApiController($name);

        $this->info('CRUD for '. $name. ' created successfully');
    }
}

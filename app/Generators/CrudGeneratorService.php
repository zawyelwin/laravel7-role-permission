<?php

namespace App\Generators;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CrudGeneratorService
{

    protected static function GetStubs($type)
    {
        return file_get_contents(__DIR__ ."/stubs/$type.stub");
    }


    /**
     * @param $name
     * This will create controller from stub file
     */
    public static function MakeController($name)
    {
        $template = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
            ],
            [
                $name,
                strtolower( Str::plural($name)),
                strtolower($name)
            ],

           CrudGeneratorService::GetStubs('Controller')
        );

        file_put_contents(app_path("/Http/Controllers/{$name}Controller.php"), $template);

    }

    /**
     * @param $name
     * This will create API controller from stub file
     */
    public static function MakeApiController($name)
    {
        $template = str_replace(
            [
                '{{modelName}}',
                '{{modelNamePluralLowerCase}}',
                '{{modelNameSingularLowerCase}}',
            ],
            [
                $name,
                strtolower( Str::plural($name)),
                strtolower($name)
            ],

           CrudGeneratorService::GetStubs('ApiController')
        );

        file_put_contents(app_path("/Http/Controllers/{$name}Controller.php"), $template);

    }

    /**
     * @param $name
     * This will create model from stub file
     */
    public static function MakeModel($name)
    {
        $template = str_replace(
            ['{{modelName}}'],
            [$name],
            CrudGeneratorService::GetStubs('Model')
        );

        file_put_contents(app_path("/{$name}.php"), $template);
    }

    /**
     * @param $name
     * This will create Request from stub file
     */
    public static function MakeRequest($name)
    {
        $template = str_replace(
            ['{{modelName}}'],
            [$name],
           CrudGeneratorService::GetStubs('Request')
        );

        if (!file_exists($path=app_path('/Http/Requests/')))
            mkdir($path, 0777, true);

        file_put_contents(app_path("/Http/Requests/{$name}Request.php"), $template);
    }

    /**
     * @param $name
     * This will create migration using artisan command
     */
    public static function MakeMigration($name)
    {
        Artisan::call('make:migration create_'. strtolower( Str::plural($name)).'_table --create='. strtolower( Str::plural($name)));

    }

    /**
     * @param $name
     * This will create route in api.php file
     */
    public static function MakeApiRoute($name)
    {
        $path_to_file  = base_path('routes/api.php');
        $append_route = 'Route::apiResource(\'' . Str::plural(strtolower($name)) . "', '{$name}Controller'); \n";
        File::append($path_to_file, $append_route);
    }

    /**
     * @param $name
     * This will create route in api.php file
     */
    public static function MakeRoute($name)
    {
        $path_to_file  = base_path('routes/web.php');
        $append_route = 'Route::resource(\'' . Str::plural(strtolower($name)) . "', '{$name}Controller'); \n";
        File::append($path_to_file, $append_route);
    }
}
<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class ModuleMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:create {moduleName} {directory?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kallavi Module Command';

    /**
     * Execute the console command.
     */
    public function __construct(Filesystem $filesystem)
    {
        parent::__construct();
        $this->filesystem = $filesystem;
    }

    public function handle()
    {
        $this->alert('Kallavi Modül Creator V0.1');
        $moduleName = $this->argument('moduleName');
        $onlyDirectory = $this->argument('directory');
        $this->line('>'.$moduleName.' modülü oluşturuluyor.');

        $modulePath = app_path('Modules/' . $moduleName);
        $this->createModuleDirectory($modulePath);
        $this->generateFiles($moduleName, $modulePath);

        $this->info('Module created successfully!');
    }

    private function createModuleDirectory($modulePath)
    {
        if (!$this->filesystem->isDirectory($modulePath)) {
            $this->filesystem->makeDirectory($modulePath, 0777, true);
            $this->filesystem->makeDirectory($modulePath . '/Frontend', 0777, true);
            $this->filesystem->makeDirectory($modulePath . '/Backend', 0777, true);
            $this->filesystem->makeDirectory($modulePath . '/Migrations',0777,true);
        }
    }

    private function generateFiles($moduleName, $modulePath)
    {
        $this->generateFilesForDirectory($moduleName, $modulePath . '/Frontend');
        $this->generateFilesForDirectory($moduleName, $modulePath . '/Backend');
        $this->generateMigration($moduleName,$modulePath);
    }

    private function generateFilesForDirectory($moduleName, $directoryPath)
    {
        $this->generateController($moduleName, $directoryPath);
        $this->generateModel($moduleName, $directoryPath);
        $this->generateViews($moduleName, $directoryPath);
        $this->generateProviders($moduleName, $directoryPath);
        $this->generateRoutes($moduleName, $directoryPath);
    }

    private function checkAndCreateFile($filePath)
    {
        if (!file_exists($filePath)) {
            $directory = dirname($filePath);
            if (!is_dir($directory)) {
                mkdir($directory, 0777, true);
            }
            touch($filePath);
        }
    }

    private function replaceModuleName($moduleName, $stub, $directory)
    {
        $words = explode("/", $directory);
        $lastWord = end($words);
        $frontendOrBackend = ($lastWord == 'Frontend')?'Frontend':'Backend';
        return str_replace('{{moduleName}}', 'App\\Modules\\'.$moduleName.'\\' .$frontendOrBackend .'\\', $stub);
    }



    private function generateController($moduleName, $directoryPath)
    {
        $controllerName = Str::studly($moduleName) . 'Controller';
        $moduleNameLower = Str::lower($moduleName)  ;
        $controllerPath = $directoryPath . '/Controllers/' . $controllerName . '.php';

        $stub = $this->filesystem->get(base_path('stubs/module-controller.stub'));
        $stub = str_replace('{{controllerName}}', $controllerName, $stub);
        $stub = str_replace('{{moduleNameLower}}', $moduleNameLower, $stub);
        $stub = str_replace('{{moduleName}}', $moduleName, $stub);
        // $stub = $this->replaceModuleName($moduleName, $stub, $directoryPath);
 
        $this->checkAndCreateFile($controllerPath);
        $this->filesystem->put($controllerPath, $stub);
        $this->line('Controller >> '.$controllerName.' oluşturuldu.');
    }

    private function generateMigration($moduleName,$modulePath)
    {
        $migrationName = date('Y').'_'.date('m').'_'.date('d').'_create_'.Str::studly($moduleName).'_table';
        $migrationPath = $modulePath . '/Migrations/' . $migrationName . '.php';

        $stub = $this->filesystem->get(base_path('stubs/module-migrations.stub'));
        $stub = str_replace('{{tableName}}', $moduleName, $stub);
        $stub = $this->replaceModuleName($moduleName, $stub, $modulePath);

        $this->checkAndCreateFile($migrationPath);
        $this->filesystem->put($migrationPath, $stub);
        $this->line('Migration >> '.$migrationName.' oluşturuldu.');
    }

    private function generateModel($moduleName, $directoryPath)
    {
        $modelName = Str::studly($moduleName);
        $modelPath = $directoryPath . '/Models/' . $modelName . '.php';

        $stub = $this->filesystem->get(base_path('stubs/module-model.stub'));
        $stub = str_replace('{{modelName}}', $modelName, $stub);
        $stub = $this->replaceModuleName($moduleName, $stub, $directoryPath);

        $this->checkAndCreateFile($modelPath);
        $this->filesystem->put($modelPath, $stub);
        $this->line('Model >> '.$modelName.' oluşturuldu.');
    }

    private function generateViews($moduleName, $directoryPath)
    {
        $viewsPath = $directoryPath . '/Views';

        if (!$this->filesystem->isDirectory($viewsPath)) {
            $this->filesystem->makeDirectory($viewsPath, 0755, true);
        }

        // Generate sample view file (e.g., index.blade.php)
        $sampleViewPath = $viewsPath . '/index.blade.php';
        $stub = $this->filesystem->get(base_path('stubs/module-view.stub'));
        $stub = $this->replaceModuleName($moduleName, $stub, $directoryPath);

        $this->checkAndCreateFile($sampleViewPath);
        $this->filesystem->put($sampleViewPath, $stub);
        $this->line('View >> index.blade.php oluşturuldu.');

    }

    private function generateProviders($moduleName, $directoryPath)
    {
        $providerName = Str::studly($moduleName) . 'ServiceProvider';
        $providerPath = $directoryPath . '/Providers/' . $providerName . '.php';

        $stub = $this->filesystem->get(base_path('stubs/module-provider.stub'));
        $stub = $this->replaceModuleName($moduleName, $stub, $directoryPath);
        $stub = str_replace('{{providerName}}', $providerName, $stub);

        $this->checkAndCreateFile($providerPath);
        $this->filesystem->put($providerPath, $stub);
        $this->line('Provider >> '.$providerName. ' oluşturuldu.');

    }

    private function generateRoutes($moduleName, $directoryPath)
    {
        $routesPath = $directoryPath . '/Routes';
        $moduleNameLower = Str::lower($moduleName);
        if (!$this->filesystem->isDirectory($routesPath)) {
            $this->filesystem->makeDirectory($routesPath, 0755, true);
        }

        // Generate sample route file (e.g., web.php)
        $sampleRoutePath = $routesPath . '/web.php';
        $stub = $this->filesystem->get(base_path('stubs/module-route.stub'));
        // $stub = $this->replaceModuleName($moduleName, $stub, $directoryPath);
        $stub = str_replace('{{moduleName}}', $moduleName, $stub);
        $stub = str_replace('{{moduleNameLower}}', $moduleNameLower, $stub);
        $this->checkAndCreateFile($sampleRoutePath);
        $this->filesystem->put($sampleRoutePath, $stub);
    }
}

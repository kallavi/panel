<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MigrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        $modulePath = app_path('Modules');
        $migrationArray = [];
        if (file_exists($modulePath)) {
            $modules = scandir($modulePath);
            foreach ($modules as $module) {
                if ($module !== '.' && $module !== '..') {
                    $migrationsPath = $modulePath . '/' . $module . '/Migrations';
                    if (is_dir($migrationsPath)) {
                        $migrationArray[] = $migrationsPath;
                    }
                }
            }
            $this->loadMigrationsFrom($migrationArray);
        }
    }
}

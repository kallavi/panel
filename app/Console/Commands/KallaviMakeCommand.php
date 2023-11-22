<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class KallaviMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kallavi:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(Filesystem $filesystem)
    {
        parent::__construct();
        $this->filesystem = $filesystem;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $layoutsPath = resource_path('views/layouts');
        $this->createDirectory($layoutsPath);
        $this->createLayoutsBlade($layoutsPath);
        $this->createIncludeHeadBlade();
        $this->createBackofficeInludeFile();
    }

    private function checkAndCreateFile($controllerPath){
        if (!file_exists($controllerPath)) {
            // Eksik dizinleri oluşturun
            $dizin = dirname($controllerPath);
            if (!is_dir($dizin)) {
                mkdir($dizin, 0777, true);
            }

            // Dosyayı oluşturun
            touch($controllerPath);
        }
    }

    public function createDirectory($layoutsPath){
        if (!$this->filesystem->isDirectory($layoutsPath)) {
            $this->filesystem->makeDirectory($layoutsPath, 0777, true);
            $this->info('Layouts klasörü oluşturuldu!');
        }else{
            $this->line('<bg=red;fg=white>Hata!</> Layouts klasörü mevcut!');
            die;
        }
    }

    public function createLayoutsBlade($layoutsPath){
        $appLayoutsPath = $layoutsPath . '/app.blade.php';
        $backofficeLayoutsPath = $layoutsPath . '/backoffice.blade.php';

        $stub = $this->filesystem->get(base_path('stubs/app-blade.stub'));
        $backStub = $this->filesystem->get(base_path('stubs/backoffice-blade.stub'));

        $this->checkAndCreateFile($appLayoutsPath);
        $this->checkAndCreateFile($backofficeLayoutsPath);

        $this->filesystem->put($appLayoutsPath, $stub);
        $this->filesystem->put($backofficeLayoutsPath, $backStub);


        $this->info('app.blade.php ve backoffice.blade.php layouts dosyaları oluşturuldu!');
    }

    public function createIncludeHeadBlade(){
        $includeDirectory = resource_path('views/includes');
        $files = [
            $includeDirectory . '/head.blade.php',
            $includeDirectory . '/header.blade.php',
            $includeDirectory . '/footer.blade.php',
            $includeDirectory . '/footerScripts.blade.php'
        ];

        foreach($files as $file){
            $this->checkAndCreateFile($file);
        }
        $this->info('include dosyaları oluşturuldu!');
    }

    private function createBackofficeInludeFile(){
        $includeDirectory = resource_path('views/includes/backoffice');

        $header  = $includeDirectory . '/header.blade.php';
        $sidebar = $includeDirectory . '/sidebar.blade.php';
        $footer  = $includeDirectory . '/footer.blade.php';

        $this->checkAndCreateFile($header);
        $this->checkAndCreateFile($sidebar);
        $this->checkAndCreateFile($footer);

        $headerStub = $this->filesystem->get(base_path('stubs/backoffice-header.stub'));
        $sidebarStub = $this->filesystem->get(base_path('stubs/backoffice-sidebar.stub'));
        $footerStub = $this->filesystem->get(base_path('stubs/backoffice-footer.stub'));

        $this->filesystem->put($header, $headerStub);
        $this->filesystem->put($sidebar, $sidebarStub);
        $this->filesystem->put($footer, $footerStub);
        $this->info('Backoffice dosyaları oluşturuldu!');
    }
}

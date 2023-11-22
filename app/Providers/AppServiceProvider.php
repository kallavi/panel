<?php

namespace App\Providers;

use App\Models\Bank;
use App\Models\ProductCategory;
use App\Modules\Menu\Backend\Models\Menu;
use App\Modules\Setting\Backend\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        if (request()->segment(1)) {
            App::setLocale(request()->segment(1));
        } else {
            App::setLocale('tr');
        }

        Paginator::defaultView('shared.front.include.pagination');
        Paginator::defaultSimpleView('shared.front.include.pagination');
        $data['menu'] = Menu::withTranslation()->get();
        $data['setting'] = Setting::withTranslation()->first();

        View::share('data', $data);
        session()->put('customer_id', uniqid());
        $this->loadModuleViews();
    }

    private function loadModuleViews()
    {
        $modulePath = app_path('Modules');

        if (file_exists($modulePath)) {
            $modules = scandir($modulePath);

            foreach ($modules as $module) {
                if ($module !== '.' && $module !== '..') {
                    $viewsAdminPath = $modulePath . '/' . $module . '/Backend/Views';
                    $viewsPath = $modulePath . '/' . $module . '/Frontend/Views';
                    if (is_dir($viewsAdminPath)) {
                        $this->loadViewsFrom($viewsAdminPath, $module . "-Backend");
                    }

                    if (is_dir($viewsPath)) {
                        $this->loadViewsFrom($viewsPath, $module . "-Frontend");
                    }
                }
            }
        }
    }
}

<?php

namespace App\Providers;

use App\Http\Composers\Backend\SidebarComposer;
use App\Http\Composers\GlobalComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

/**
 * Class ComposerServiceProvider
 * @package App\Providers
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * Global
         */
        View::composer('*', GlobalComposer::class);

        /*
         * Frontend
         */

        /*
         * Backend
         */
        View::composer('backend.includes.sidebar', SidebarComposer::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

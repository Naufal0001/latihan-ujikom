<?php

namespace App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Barryvdh\DomPDF\Facade as PDF; // Corrected the import statement

class AliasServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $loader = AliasLoader::getInstance();

        // Correctly add your aliases
        $loader->alias('PDF', PDF::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
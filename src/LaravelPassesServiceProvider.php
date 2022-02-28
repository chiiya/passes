<?php

namespace Chiiya\LaravelPasses;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Chiiya\LaravelPasses\Commands\LaravelPassesCommand;

class LaravelPassesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-passes')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-passes_table')
            ->hasCommand(LaravelPassesCommand::class);
    }
}

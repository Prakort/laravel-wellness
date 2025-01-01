<?php

namespace prakort\LaravelWellness;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use prakort\LaravelWellness\Commands\LaravelWellnessCommand;

class LaravelWellnessServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-wellness')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_wellness_table')
            ->hasCommand(LaravelWellnessCommand::class);
    }
}
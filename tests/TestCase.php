<?php

namespace Chiiya\LaravelPasses\Tests;

use Chiiya\LaravelPasses\LaravelPassesServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');
        $app->useEnvironmentPath(__DIR__.'/..');
        $app->bootstrapWith([LoadEnvironmentVariables::class]);
        config()->set('passes.apple.certificate', 'tests/certs/certificate.p12');
        config()->set('passes.apple.wwdr', 'tests/certs/wwdr.pem');
        config()->set('passes.apple.password', env('PASSES_APPLE_PASSWORD'));

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-passes_table.php.stub';
        $migration->up();
        */
    }

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Chiiya\\LaravelPasses\\Database\\Factories\\'.class_basename(
                $modelName
            ).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [LaravelPassesServiceProvider::class];
    }
}

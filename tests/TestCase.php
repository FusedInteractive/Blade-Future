<?php

namespace Fused\BladeFuture\Tests;

use Fused\BladeFuture\BladeFutureServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function defineEnvironment($app): void
    {
        $app->config->set('view.cache', false);

        Blade::anonymousComponentPath(dirname(__FILE__).'/components');
        View::addLocation(dirname(__FILE__));
    }

    protected function getPackageProviders($app): array
    {
        return [BladeFutureServiceProvider::class];
    }

    protected function defineRoutes($router): void
    {
        $router->view('test', 'test');
    }
}

<?php

namespace Fused\BladeFuture;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeFutureServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(dirname(__FILE__).'/config.php', 'blade-future');
    }

    public function boot(): void
    {
        if (
            ! $this->app->environment(config('blade-future.environments'))
            && ! (
                $this->app->runningUnitTests()
                && ! config('blade-future.remove_during_tests')
            )
        ) {
            Blade::if('future', fn () => false);

            return;
        }

        Blade::directive('future', function () {
            return '<?php ob_start(); ?>';
        });

        Blade::directive('endfuture', function () {
            return '<?php echo \Fused\BladeFuture\FutureParser::parse(ob_get_clean()); ?>';
        });
    }
}

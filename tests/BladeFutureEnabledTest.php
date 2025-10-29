<?php

namespace Fused\BladeFuture\Tests;

class BladeFutureEnabledTest extends TestCase
{
    protected function defineEnvironment($app): void
    {
        parent::defineEnvironment($app);

        $app->config->set('blade-future.environments', 'testing');
        $app->config->set('blade-future.remove_during_tests', false);
    }

    public function test_render_future(): void
    {
        $this->get('/test')
            ->assertSeeHtml('<div x-future>');
    }
}

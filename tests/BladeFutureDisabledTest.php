<?php

namespace Fused\BladeFuture\Tests;

class BladeFutureDisabledTest extends TestCase
{
    public function test_doesnt_render_future(): void
    {
        $this->get('/test')
            ->assertDontSeeHtml('<div x-future>')
            ->assertDontSeeHtml('<div>This is a test component.</div>');
    }
}

<?php

namespace Tests\Feature\Home;

use Tests\TestCase;

/**
 * @internal
 *
 * @coversNothing
 */
class IndexTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testExample(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

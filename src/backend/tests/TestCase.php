<?php

namespace Tests;

use Database\Seeders\Test\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    /**
     * setup
     */
    protected function setUp(): void
    {
        parent::setUp();

        // テストに最低限必要なデータを投入
        $this->seed(DatabaseSeeder::class);
    }
}

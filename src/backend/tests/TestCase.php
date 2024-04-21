<?php

namespace Tests;

use Database\Seeders\Test\DatabaseSeeder;
use Database\Seeders\Test\TruncateAllTables;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * setup
     */
    protected function setUp(): void
    {
        parent::setUp();

        // 全テーブルをtruncate
        $this->seed(TruncateAllTables::class);

        // テストに最低限必要なデータを投入
        $this->seed(DatabaseSeeder::class);
    }
}

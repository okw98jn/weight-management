<?php

namespace Database\Seeders\Test;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * 各テスト実行前に全テーブルをtruncateするシーダー
 */
class TruncateAllTables extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        foreach (Schema::getTables() as $table) {
            if ('migrations' == $table['name']) {
                continue;
            }

            DB::table($table['name'])->truncate();
        }

        Schema::enableForeignKeyConstraints();
    }
}

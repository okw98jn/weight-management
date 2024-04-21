<?php

namespace Database\Seeders\Test\Home\Index;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * 目標設定が存在しない場合のレスポンステストで使用するシーダー
 */
class ResponseWhenGoalSettingNotFoundSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->truncateTables();
    }

    /**
     * テーブルをリセット
     */
    private function truncateTables(): void
    {
        DB::table('goal_settings')->truncate();
    }
}

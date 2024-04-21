<?php

namespace Database\Seeders\Test\Home\Index;

use App\Models\GoalSetting;
use App\Models\WeightReport;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * 成功テストで使用するシーダー
 */
class SuccessSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->truncateTables();

        $this->insertGoalSettings();

        $this->insertWeightReports();
    }

    /**
     * テーブルをリセット
     */
    private function truncateTables(): void
    {
        DB::table('goal_settings')->truncate();
        DB::table('weight_reports')->truncate();
    }

    /**
     * 目標設定を登録
     */
    private function insertGoalSettings(): void
    {
        GoalSetting::insert([
            [
                'user_id' => 1,
                'start_weight' => 60.0,
                'goal_weight' => 55.0,
                'is_current_goal' => true,
            ],
            [
                'user_id' => 1,
                'start_weight' => 70.0,
                'goal_weight' => 65.0,
                'is_current_goal' => false,
            ],
        ]);
    }

    /**
     * 体重記録を登録
     */
    private function insertWeightReports(): void
    {
        WeightReport::insert([
            [
                'user_id' => 1,
                'weight' => 60.0,
                'report_date' => '2024-01-01',
            ],
            [
                'user_id' => 1,
                'weight' => 50.0,
                'report_date' => '2024-01-02',
            ],
            [
                'user_id' => 1,
                'weight' => 70.0,
                'report_date' => now()->format('Y-m-d'),
            ],
        ]);
    }
}

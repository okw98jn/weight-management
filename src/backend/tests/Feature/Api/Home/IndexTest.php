<?php

namespace Tests\Feature\Home;

use Database\Seeders\Test\Home\Index\ResponseWhenGoalSettingNotFoundSeeder;
use Database\Seeders\Test\Home\Index\SuccessSeeder;
use Tests\TestCase;

/**
 * ホーム画面で表示するデータ取得APIテスト
 *
 * @internal
 *
 * @coversNothing
 */
class IndexTest extends TestCase
{
    private const INDEX_ROUTE = 'home.index';

    /**
     * 成功
     */
    public function testSuccess(): void
    {
        $this->seed(SuccessSeeder::class);

        $response = $this->get(route(self::INDEX_ROUTE));

        $response->assertStatus(200)->assertJson([
            'top_card' => [
                'today_weight' => '70.0kg',
                'weight_diff' => '15.0kg',
                'start_weight' => '60.0kg',
                'goal_weight' => '55.0kg',
                'is_lower' => false,
            ],
            'daily_card' => [
                0 => [
                    'weight' => '50.0kg',
                    'weight_diff' => '-5.0kg',
                    'report_date' => '2024-01-02',
                    'is_lower' => true,
                ],
                1 => [
                    'weight' => '60.0kg',
                    'weight_diff' => '5.0kg',
                    'report_date' => '2024-01-01',
                    'is_lower' => false,
                ],
            ],
        ]);
    }

    /**
     * 目標設定が存在しない場合のレスポンスをテスト
     * 404とエラーメッセージが返ること
     */
    public function testResponseWhenGoalSettingNotFound(): void
    {
        $this->seed(ResponseWhenGoalSettingNotFoundSeeder::class);

        $response = $this->get(route(self::INDEX_ROUTE));

        $response->assertNotFound()->assertJson(['message' => __('home.goal_setting.not_found')]);
    }
}

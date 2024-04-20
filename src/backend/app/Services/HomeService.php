<?php

namespace App\Services;

use App\Facades\WeightUtil;
use App\Models\GoalSetting;
use App\Models\User;
use App\Models\WeightReport;
use Illuminate\Support\Facades\Log;

/**
 * ホームAPIのビジネスロジックを提供するサービスクラス
 */
class HomeService
{
    /**
     * ホーム画面で表示するデータを取得
     *
     * @return object
     *
     * @throws Exception
     */
    public function getIndexData(): object
    {
        try {
            $user = User::find(1)->first();

            // 現在の目標設定を取得
            $goalSetting = $this->getCurrentGoalSetting($user->id);

            return collect([
                'top_card' => $this->getTopCardData($user->id, $goalSetting->start_weight, $goalSetting->goal_weight),
                'daily_card' => $this->getDailyCardData($user->id, $goalSetting->goal_weight),
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            throw $e;
        }
    }

    /**
     * トップカードに表示するデータを取得
     *
     * @param int    $userId
     * @param string $startWeight
     * @param string $goalWeight
     *
     * @return object
     */
    private function getTopCardData(int $userId, string $startWeight, string $goalWeight): object
    {
        // 本日の体重を取得
        $todayWeight = WeightReport::select('weight')->where('user_id', $userId)
            ->whereDate('report_date', now())
            ->first()
            ->weight ?? '0.0kg'
        ;

        // 本日の体重と目標体重の差を取得
        $weightDiff = WeightUtil::calcWeightDiff(
            WeightUtil::removeKgString($todayWeight),
            WeightUtil::removeKgString($goalWeight)
        );

        return collect([
            'today_weight' => $todayWeight,
            'weight_diff' => WeightUtil::addKgString($weightDiff),
            'start_weight' => $startWeight,
            'goal_weight' => $goalWeight,
            'is_lower' => WeightUtil::isLower($weightDiff),
        ]);
    }

    /**
     * Dailyカードに表示するデータを取得
     *
     * @param int    $userId
     * @param string $goalWeight
     *
     * @return object
     */
    private function getDailyCardData(int $userId, string $goalWeight): object
    {
        return WeightReport::where('user_id', $userId)
            ->where('report_date', '<', today())
            ->orderBy('report_date', 'desc')
            ->limit(config('home.daily_card.max_data_length'))
            ->get()
        ;
    }

    /**
     * ユーザーの現在の目標設定を取得
     *
     * @param int $userId
     *
     * @return GoalSetting
     */
    private function getCurrentGoalSetting(int $userId): GoalSetting
    {
        return GoalSetting::where('user_id', $userId)
            ->where('is_current_goal', true)
            ->first()
        ;
    }
}

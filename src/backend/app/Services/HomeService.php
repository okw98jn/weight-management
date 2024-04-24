<?php

namespace App\Services;

use App\Exceptions\GoalSettingNotFoundException;
use App\Facades\WeightUtil;
use App\Models\GoalSetting;
use App\Models\User;
use App\Models\WeightReport;
use Carbon\Carbon;
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
     * @throws \Exception
     */
    public function getIndexData(): object
    {
        try {
            $user = User::findOrFail(1);

            // 現在の目標設定を取得
            $goalSetting = $this->getCurrentGoalSetting($user->id);

            return collect([
                'top_card' => $this->getTopCardData($user->id, $goalSetting->start_weight, $goalSetting->goal_weight),
                'daily_card' => $this->getDailyCardData($user->id, $goalSetting->goal_weight),
                'main_card' => [
                    'graph' => $this->getGraphData($user->id),
                    'calendar' => $this->getCalendarData($user->id),
                ],
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            throw $e;
        }
    }

    /**
     * トップカードに表示するデータを取得
     *
     * @param int   $userId
     * @param float $startWeight
     * @param float $goalWeight
     *
     * @return object
     */
    private function getTopCardData(int $userId, float $startWeight, float $goalWeight): object
    {
        // 今日の体重を取得
        $todayWeight = WeightReport::select('weight')->where('user_id', $userId)
            ->whereDate('report_date', now())
            ->first()
            ->weight ?? 0.0
        ;

        // 今日の体重と目標体重の差を取得
        $weightDiff = WeightUtil::calcWeightDiff($todayWeight, $goalWeight);

        return collect([
            'today_weight' => $todayWeight,
            'weight_diff' => $weightDiff,
            'start_weight' => $startWeight,
            'goal_weight' => $goalWeight,
            'is_lower' => WeightUtil::isLower($weightDiff),
        ]);
    }

    /**
     * Dailyカードに表示するデータを取得
     *
     * @param int   $userId
     * @param float $goalWeight
     *
     * @return object
     */
    private function getDailyCardData(int $userId, float $goalWeight): object
    {
        // 過去の記録を取得
        $weightReports = WeightReport::select('weight', 'report_date')
            ->where('user_id', $userId)
            ->where('report_date', '<', today())
            ->orderBy('report_date', 'desc')
            ->limit(config('home.daily_card.max_data_length'))
            ->get()
        ;

        // 各要素に目標体重との差と比較結果を追加
        return $weightReports->map(function ($report) use ($goalWeight) {
            $report['weight_diff'] = WeightUtil::calcWeightDiff($report['weight'], $goalWeight);
            $report['is_lower'] = WeightUtil::isLower($report['weight_diff']);

            return $report;
        });
    }

    /**
     * ユーザーの現在の目標設定を取得
     *
     * @param int $userId
     *
     * @return GoalSetting
     *
     * @throws GoalSettingNotFoundException
     */
    private function getCurrentGoalSetting(int $userId): GoalSetting
    {
        // 目標設定を取得
        $goalSetting = GoalSetting::select('start_weight', 'goal_weight')
            ->where('user_id', $userId)
            ->where('is_current_goal', true)
            ->first()
        ;

        // 目標設定が存在しない場合は専用の例外をスロー
        if (!$goalSetting) {
            throw new GoalSettingNotFoundException(__('home.goal_setting.not_found'));
        }

        return $goalSetting;
    }

    /**
     * グラフに表示するデータを取得
     *
     * @param int $userId
     *
     * @return object
     */
    private function getGraphData(int $userId): object
    {
        // 30日分の体重記録を取得
        $weightReports = WeightReport::select('weight', 'report_date')
            ->where('user_id', $userId)
            ->orderBy('report_date', 'desc')
            ->limit(config('home.main_card.graph.max_data_length'))
            ->get()
            ->reverse()
        ;

        // グラフに表示するデータを整形する
        return $weightReports->map(function ($report) {
            return [
                'weight' => $report['weight'],
                'report_date' => Carbon::parse($report['report_date'])->format('n.j'),
            ];
        });
    }

    /**
     * カレンダーに表示するデータを取得
     *
     * @param int $userId
     *
     * @return object
     */
    private function getCalendarData(int $userId): object
    {
        // 当月の体重記録を取得
        return WeightReport::select('id', 'weight', 'report_date')
            ->where('user_id', $userId)
            ->whereBetween('report_date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            ->get();
    }
}

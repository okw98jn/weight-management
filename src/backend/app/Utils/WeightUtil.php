<?php

namespace App\Utils;

/**
 * 体重に関するユーティリティクラス
 */
class WeightUtil
{
    /**
     * 小数の体重をkg表記に変換する
     * 体重は計算に使用するため、アクセサは使用しない
     *
     * @param float $weight
     *
     * @return string
     */
    public function addKgString(float $weight): string
    {
        return $weight.'kg';
    }

    /**
     * 体重差を計算する
     *
     * @param float $todayWeight
     * @param float $weight
     *
     * @return float
     */
    public function calcWeightDiff(float $todayWeight, float $weight): float
    {
        // 本日の体重が0.0の場合は未記録として0.0を返す
        if (0.0 === $todayWeight) {
            return 0.0;
        }

        return round($weight - $todayWeight, 1);
    }

    /**
     * 体重差がマイナスかどうかを判定する
     *
     * @param float $weightDiff
     *
     * @return bool
     */
    public function isLower(float $weightDiff): bool
    {
        return $weightDiff < 0;
    }
}

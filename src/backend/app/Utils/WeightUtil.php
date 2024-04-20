<?php

namespace App\Utils;

use Illuminate\Support\Str;

/**
 * 体重に関するユーティリティクラス
 */
class WeightUtil
{
    /**
     * kg表記の体重を小数に変換する
     * アクセサを使用しているためこのメソッドで変換する必要がある
     *
     * @param string $weight
     *
     * @return float
     */
    public function removeKgString(string $weight): float
    {
        return (float) Str::remove('kg', $weight);
    }

    /**
     * 小数の体重をkg表記に変換する
     * アクセサを使用できない場合に使用する
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

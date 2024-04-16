<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Log;

/**
 * ホームAPIのビジネスロジックを提供するサービスクラス
 */
class HomeService
{
    /**
     * ホーム画面で表示するデータを取得
     *
     * @return User
     *
     * @throws Exception
     */
    public function getIndexData(): User
    {
        try {
            return User::find(1)->first();
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            throw $e;
        }
    }
}

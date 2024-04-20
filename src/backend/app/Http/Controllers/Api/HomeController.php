<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\GoalSettingNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\Home\HomeResource;
use App\Services\HomeService;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    /**
     * ホーム画面で表示するデータを取得するAPI
     *
     * @param HomeService $service
     *
     * @return HomeResource|JsonResponse
     */
    public function index(HomeService $service): HomeResource|JsonResponse
    {
        try {
            return new HomeResource($service->getIndexData());
        } catch (GoalSettingNotFoundException $e) {
            return response()->json(['message' => __('home.goal_setting.not_found')], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => __('error.e500')], 500);
        }
    }
}

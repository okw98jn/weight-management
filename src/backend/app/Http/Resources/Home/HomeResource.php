<?php

namespace App\Http\Resources\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
{
    /**
     * Transform the resource into an array
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'top_card' => [
                'today_weight' => '70.0kg',
                'weight_diff' => '3.0kg',
                'start_weight' => $this->currentGoalSetting->start_weight,
                'goal_weight' => $this->currentGoalSetting->goal_weight,
            ],
        ];
    }
}

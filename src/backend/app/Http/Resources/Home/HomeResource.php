<?php

namespace App\Http\Resources\Home;

use App\Facades\WeightUtil;
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
                'today_weight' => WeightUtil::addKgString($this['top_card']['today_weight']),
                'weight_diff' => WeightUtil::addKgString($this['top_card']['weight_diff']),
                'start_weight' => WeightUtil::addKgString($this['top_card']['start_weight']),
                'goal_weight' => WeightUtil::addKgString($this['top_card']['goal_weight']),
                'is_lower' => $this['top_card']['is_lower'],
            ],
            'daily_card' => WeightReportsResource::collection($this['daily_card']),
        ];
    }
}

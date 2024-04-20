<?php

namespace App\Http\Resources\Home;

use App\Facades\WeightUtil;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TopCardResource extends JsonResource
{
    /**
     * Transform the resource into an array
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'today_weight' => WeightUtil::addKgString($this['today_weight']),
            'weight_diff' => WeightUtil::addKgString($this['weight_diff']),
            'start_weight' => WeightUtil::addKgString($this['start_weight']),
            'goal_weight' => WeightUtil::addKgString($this['goal_weight']),
            'is_lower' => $this['is_lower'],
        ];
    }
}

<?php

namespace App\Http\Resources\Home;

use App\Facades\WeightUtil;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DailyCardResource extends JsonResource
{
    /**
     * Transform the resource into an array
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'weight' => WeightUtil::addKgString($this['weight']),
            'weight_diff' => WeightUtil::addKgString($this['weight_diff']),
            'report_date' => $this['report_date'],
            'is_lower' => $this['is_lower'],
        ];
    }
}

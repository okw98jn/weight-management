<?php

namespace App\Http\Resources\Home;

use App\Facades\WeightUtil;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WeightReportsResource extends JsonResource
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
            'weight_diff' => WeightUtil::addKgString(1.1),
            // 'weight_diff' => $this->weight_diff,
            'report_date' => $this['report_date'],
            'is_lower' => true,
            // 'is_lower' => $this->is_lower,
        ];
    }
}

<?php

namespace App\Http\Resources\Home;

use App\Facades\WeightUtil;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CalendarResource extends JsonResource
{
    /**
     * Transform the resource into an array
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['id'],
            'title' => WeightUtil::addKgString($this['weight']),
            'start' => $this['report_date'],
        ];
    }
}

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
            'top_card' => new TopCardResource($this['top_card']),
            'daily_card' => DailyCardResource::collection($this['daily_card']),
            'main_card' => [
                'graph' => GraphResource::collection($this['main_card']['graph']),
                'calendar' => CalendarResource::collection($this['main_card']['calendar']),
            ],
        ];
    }
}

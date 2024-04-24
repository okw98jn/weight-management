<?php

namespace App\Http\Resources\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GraphResource extends JsonResource
{
    /**
     * Transform the resource into an array
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'date' => $this['report_date'],
            'weight' => $this['weight'],
        ];
    }
}

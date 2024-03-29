<?php

namespace App\Http\Resources\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => $this->category['name'],
            'company' => $this->company['name'],
            'province' => $this->province['name'],
            'city' => $this->city['name'],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

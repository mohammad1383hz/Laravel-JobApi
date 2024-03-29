<?php

namespace App\Http\Resources\Home;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RequestResource extends JsonResource
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
            'company' => $this->company['name'],
            'job' => $this->job,
            'resome_id' => $this->resome_id,
            'description' => $this->description,

            'status' => $this->status,


            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

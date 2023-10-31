<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'name' => $this->name,
            'phone' => $this->phone,
            'brand' => $this->brand,
            'description' => $this->description,

            'web_site' => $this->web_site,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

<?php

namespace App\Http\Resources\HomeCompany;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class UserResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name'=> $this->first_name,
            'last_name'=> $this->last_name,
            'phone'=> $this->phone,
           
        ];
    }
}

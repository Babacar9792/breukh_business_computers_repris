<?php

namespace App\Http\Resources\Amis;

use App\Http\Resources\Succusale\SuccursaleResource;
use App\Models\Succursale;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Amisresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "id" => $this->id,
            "from" => SuccursaleResource::make(Succursale::find($this->from)),
            "to" => SuccursaleResource::make(Succursale::find($this->to)),
            "accepted" => $this->accepted
        ];
    }
}

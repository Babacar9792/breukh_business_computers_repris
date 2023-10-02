<?php

namespace App\Http\Resources\Marque;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MarqueResource extends JsonResource
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
            "libelle" => $this->libelle
        ];
    }
}

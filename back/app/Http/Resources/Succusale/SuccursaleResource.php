<?php

namespace App\Http\Resources\Succusale;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuccursaleResource extends JsonResource
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
            "nom" => $this->nom,
            "telephone" => $this->telephone,
            "email" => $this->email,
            "adresse" => $this->adresse
        ];
    }
}

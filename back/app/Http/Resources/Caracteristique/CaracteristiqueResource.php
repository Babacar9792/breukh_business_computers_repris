<?php

namespace App\Http\Resources\Caracteristique;

use App\Http\Resources\Unite\UniteResource;
use App\Models\Unite;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CaracteristiqueResource extends JsonResource
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
            "libelle" => $this->libelle,
            "valeurs_possible" => $this->valeurs_possible,
            "unite" => UniteResource::make(Unite::find($this->pivot["unite_id"])),
            "valeur" => $this->pivot["valeur"]
        ];
    }
}

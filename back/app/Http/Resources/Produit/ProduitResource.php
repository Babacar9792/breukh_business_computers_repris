<?php

namespace App\Http\Resources\Produit;

use App\Http\Resources\Caracteristique\CaracteristiqueResource;
use App\Http\Resources\Categorie\CategorieResource;
use App\Http\Resources\Marque\MarqueResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProduitResource extends JsonResource
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
            "code" => $this->code,
            "description" => $this->description,
            "marque" => MarqueResource::make($this->marque),
            "categorie" => CategorieResource::make($this->categorie),
            "photo" => $this->photo,
            "caracteristiques" => CaracteristiqueResource::collection($this->caracteristiques)
        ];
    }
}

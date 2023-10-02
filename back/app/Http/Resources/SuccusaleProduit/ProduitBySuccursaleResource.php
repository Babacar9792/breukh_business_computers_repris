<?php

namespace App\Http\Resources\SuccusaleProduit;

use App\Http\Resources\Produit\ProduitResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProduitBySuccursaleResource extends JsonResource
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
            "produit" => ProduitResource::make($this->produit),
            "prix" => $this->prix,
            "stock" => $this->stock
        ];
    }
}

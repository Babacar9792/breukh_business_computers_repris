<?php

namespace App\Http\Resources\SuccusaleProduit;

use App\Http\Resources\Produit\ProduitResource;
use App\Http\Resources\Succusale\SuccursaleResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuccursaleProduitResource extends JsonResource
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
            "succursale" => SuccursaleResource::make($this->succursale),
            "produit" => ProduitResource::make($this->produit),
            "prix" => $this->prix,
            "stock" => $this->stock
        ];
    }
}

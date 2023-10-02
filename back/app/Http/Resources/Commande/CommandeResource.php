<?php

namespace App\Http\Resources\Commande;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommandeResource extends JsonResource
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
            "numero_commande" => $this->numero_commande,
            "date_commande" => $this->date_commande,
            "etat_commande" => $this->etat_commande,
            "utilisateur" => $this->utilisateur,
            "commande_produits" => $this->commande_produits

        ];
    }
}

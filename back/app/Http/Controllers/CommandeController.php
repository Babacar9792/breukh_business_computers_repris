<?php

namespace App\Http\Controllers;

use App\Http\Resources\Commande\CommandeResource;
use App\Models\Avance;
use App\Models\Commande;
use App\Models\CommandeProduit;
use App\Trait\Shared;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{

    use Shared;

    public function addCommande(Request $request)
    {
        try {

            DB::beginTransaction();
            $montant = $this->getMontant($request->produit_vendus);
            $commande = Commande::create([
                "utilisateur_id" => $request->utilisateur_id,
                // "client_id" => $request->client_id,
                // "reduction" => $request->reduction,
                "etat_commande" => $montant == $request->montant_entre ? 'ACCEPTED' : 'IN PROGRESS'

            ]);
            /* 
            
            "utilisateur_id" : 1,
            "client_id" : 2,
            "produit_vendus" : [
                {
                    "succursale_produit_id" : 1,
                    "prix_vente" : 1200,
                    "quantite_vendue" : 12

                }
            ]
            
            */
            $tabProduitWithIdCommande = [];
            foreach ($request->produit_vendus as $value) {
                # code...
                array_push($tabProduitWithIdCommande, [
                    "succursale_produit_id" => $value['succursale_produit_id'],
                    "commande_id" => $commande->id,
                    "prix_vente" => $value['prix_vente'],
                    "quantite" => $value["quantite_vendue"]
                ]);
            }


            CommandeProduit::insert($tabProduitWithIdCommande);
            Avance::create([
                "montant" => $request->montant_entre,
                "commande_id" => $commande->id,
                "date_avance" => now()
            ]);
            // SuccursaleProduit::where("id", $value['succursale_produit_id'])->update();
            foreach ($request->produit_vendus as $value) {
                DB::statement("update succursale_produits set stock = stock - " . $value['quantite_vendue'] . " where id = " . $value['succursale_produit_id']);
            }
            DB::commit();
            return $this->responseData("Commande Validée", [CommandeResource::make(Commande::find($commande->id))], true);
        } catch (\Throwable $th) {
            DB::rollBack();
            return $this->responseData($th->getMessage());
        }
    }

    public function getMontant($tab)
    {
        $total = 0;
        foreach ($tab as  $value) {
            $total = $total + $value['prix_vente'] * $value['quantite_vendue'];
        }
        return $total;
    }
    //
}
